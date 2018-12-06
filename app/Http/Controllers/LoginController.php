<?php namespace App\Http\Controllers;

use App\Http\Requests;

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class LoginController extends Controller {
    protected static $prefix = "/admin";

    public function index()
    {
        if(Sentinel::check()){
            return Redirect::to(LoginController::$prefix."/home");
        }

        return Redirect::to(LoginController::$prefix."/login");
    }

	public function loginForm()
	{
        if(Session::get("message")){
            return View::make("admin.login.index")->with("remember", Cookie::get("remember"))->with("message", Session::get("message"));
        }

        return View::make("admin.login.index")->with("remember", Cookie::get("remember"));
	}

    public function login()
    {
        $remember = false;

        if(Input::has("remember") && Input::get("remember") == 1){
            $remember = true;

            $login = Sentinel::authenticateAndRemember(array(
                'email'    => Input::get("username"),
                'password' => Input::get("password"),
            ));
        }
        else{
            $login = Sentinel::authenticate(array(
                'email'    => Input::get("username"),
                'password' => Input::get("password"),
            ));
        }

        if($login){
            $credentials = [
                'login' => Input::get("username"),
            ];

            $user = Sentinel::findByCredentials($credentials);

            $activation = Activation::exists($user);

            if($activation && $activation->completed == 0){
                return Redirect::to(LoginController::$prefix."/login")->withErrors(trans("login.validations.inactive_user"));
            }

            return Redirect::to(LoginController::$prefix)->withCookie(Cookie::forever('remember', $remember));
        }

        return Redirect::to(LoginController::$prefix.'/login')->withErrors(trans("login.validations.invalid_login"));
    }



    public function forgot(){
        $credentials = [
            'login' => Input::get("email"),
        ];

        $user = Sentinel::findByCredentials($credentials);

        if($user){

            $reminder = Reminder::create($user);

            Mail::send('admin.emails.'.App::getLocale().'.reminder', ["reminder" => $reminder], function($message) use ($user)
            {
                $message->to($user->email, $user->first_name." .$user->last_name")->subject(trans("login.emails.forgot_title"));
            });

            return Redirect::to(LoginController::$prefix.'/login')->with("message", "sent");
        }
        else{
            return Redirect::to(LoginController::$prefix.'/login')->withErrors(trans("login.validations.noexists"));
        }
    }

    public function logout(){
        if(Sentinel::check()){
            Sentinel::logout();
        }

        return Redirect::to(LoginController::$prefix."/login");
    }

    public function reset($id, $code){
        $user = Sentinel::findById($id);

        if(!$user){
            return Redirect::to(LoginController::$prefix."/login");
        }

        Reminder::removeExpired();
        $reminder = Reminder::exists($user);

        if(!$reminder){
            return Redirect::to(LoginController::$prefix."/login")->withErrors(trans("login.validations.incorrect_resetlink"));
        }

        if($reminder->completed == 1){
            return Redirect::to(LoginController::$prefix."/login")->withErrors(trans("login.validations.incorrect_resetlink"));
        }

        if(Session::get("message")){
            return View::make("admin.login.reset")->with("user", $user)->with("code", $code)->with("message", Session::get("message"));
        }

        return View::make("admin.login.reset")->with("user", $user)->with("code", $code);
    }

    public function update(){
        if(Input::get("password1") != Input::get("password2")){
            return Redirect::back()->with("message", "nomatch");
        }

        $user = Sentinel::findById(Input::get("user_id"));

        if(!$user){
            return Redirect::to(LoginController::$prefix."/login");
        }

        $reminder = Reminder::exists($user);

        if(!$reminder){
            return Redirect::to(LoginController::$prefix."/login");
        }

        Reminder::complete($user, Input::get("code"), Input::get("password1"));

        return Redirect::to(LoginController::$prefix.'/login')->with("message", "reset");
    }

    public function activate($id, $code){
        $user = Sentinel::findById($id);

        if(!$user){
            return Redirect::to(LoginController::$prefix."/login");
        }

        $activation = Activation::exists($user);

        if(!$activation){
            return Redirect::to(LoginController::$prefix."/login")->withErrors(trans("login.validations.incorrect_activationlink"));
        }

        if($activation->completed == 1){
            return Redirect::to(LoginController::$prefix."/login")->withErrors(trans("login.validations.incorrect_activationlink"));
        }

        Activation::complete($user, $code);

        return Redirect::to(LoginController::$prefix.'/login')->with("message", "activated");
    }
}
