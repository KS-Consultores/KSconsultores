<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Activations;
use App\Models\Role;
use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller {
    public function __construct(){
        parent::__construct();

        View::share("menu", "users");
        View::share("submenu", "users");
    }

    public function index()
    {  

        $users = User::where('email','<>','su@intagono.com')->get();
        return View::make('admin.users.index')->with("users", $users);
    }

    public function create()
    {
        $roles = Role::all();

        return View::make('admin.users.new')->with("roles", $roles);
    }

    public function store()
    {
        $email = Input::get("email");
        $name = Input::get("name");
        $surname = Input::get("surname");
        //$role = Input::get("role");
        $input=Input::all();
        $validator = \Validator::make($input,User::rules());       

        if ($validator->fails()) {
       
            Session::flash('error', $validator->messages());

            return Redirect::to("/".Config::get("project.prefix")."/users/create")->withInput();
        }

        $credentials = [
            'login' => $email,
        ];

        $user = Sentinel::findByCredentials($credentials);

        if($user){
            Session::flash('error', trans("users.user_already_register"));

            return Redirect::to("/".Config::get("project.prefix")."/users/create")->withInput();
        }

        if(Input::has("password1") && Input::get("password1")){
            $password = Input::get("password1");
        }
        else{
            $password = str_pad(rand(0,999999),6,"0", STR_PAD_LEFT);
        }

        Sentinel::register(array(
            'email'    => $email,
            'password' => $password,
            'first_name' => $name,
            'last_name' => $surname,
        ));

        $credentials = [
            'login' => $email,
        ];

        $user = Sentinel::findByCredentials($credentials);

        //$role = Sentinel::findRoleByName($role);
        //$role->users()->attach($user);

        $activation = Activation::create($user);

        if(Input::has("activo") && Input::get("activo") == "on"){
            Activation::complete($user, $activation->code);

            Mail::send('admin.emails.'.App::getLocale().'.welcome', ["activation" => $activation, "email" => $email, "password" => $password], function($message) use ($user)
            {
                $message->to($user->email, $user->first_name." .$user->last_name")->subject(trans("login.emails.welcome_title"));
            });

            Session::flash('success', trans("users.user_activate_confirmation"));
        }
        else{
            Mail::send('admin.emails.'.App::getLocale().'.activation', ["activation" => $activation, "email" => $email, "password" => $password], function($message) use ($user)
            {
                $message->to($user->email, $user->first_name." .$user->last_name")->subject(trans("login.emails.activation_title"));
            });

            Session::flash('success', trans("users.user_register_confirmation"));
        }

        return Redirect::to("/".Config::get("project.prefix")."/users");
    }

    public function edit($id)
    {
        $user = User::find($id);

        if(!$user){
            Session::flash('error', trans("users.user_no_exists"));

            return Redirect::to("/".Config::get("project.prefix")."/users");
        }

        $roles = Role::all();

        return View::make('admin.users.edit')->with("menu","")->with("submenu","")->with("roles", $roles)->with("user", $user);
    }

    public function update_pass()
    {
        $user = User::find(Input::get("id"));

        if(!$user){
            Session::flash('error', trans("users.user_no_exists"));

            return Redirect::to("/".Config::get("project.prefix")."/users");
        }


        $user = Sentinel::findById($user->id);

        Reminder::removeExpired();
        $reminder = Reminder::create($user);
        Reminder::complete($user, $reminder->code, Input::get("password1"));

        Session::flash('success', trans("users.user_update_confirmation"));

        return Redirect::to("/".Config::get("project.prefix")."/users");
    }

    public function update()
    {
        $user = User::find(Input::get("id"));

        if(!$user){
            Session::flash('error', trans("users.user_no_exists"));

            return Redirect::to("/".Config::get("project.prefix")."/users");
        }

        $user->first_name = Input::get("name");
        $user->last_name = Input::get("surname");

        $validator = \Validator::make([
            'name' => Input::get("name"),
            'surname' => Input::get("surname"),
        ], [
            'name' => 'regex:/^[\pL\s]+$/u',
            'surname' => 'regex:/^[\pL\s]+$/u',
        ]);

        if ($validator->fails()) {
            Session::flash('error', trans("users.user_invalid_caracter"));

            return Redirect::back()->withInput();
        }

        if(Input::has("password1") && Input::get("password1")){
            $password = Input::get("password1");
        }
        else{
            $password = str_pad(rand(0,999999),6,"0", STR_PAD_LEFT);
        }

        $user->save();

        $user = Sentinel::findById($user->id);
        /* 
        $roles = Role::all();
        if($roles) foreach($roles as $role){
            $role = Sentinel::findRoleByName($role->name);
            $role->users()->detach($user);
        }
        */  
    //  $role = Sentinel::findRoleByName(Input::get("role"));
    //  $role->users()->attach($user);

        //Reminder::removeExpired();
        //$reminder = Reminder::create($user);
        //Reminder::complete($user, $reminder->code, Input::get("password1"));

        $activations = Activations::whereRaw("user_id = $user->id")->get();
        if($activations) foreach($activations as $activation){
            $activation->delete();
        }

        $activation = Activation::create($user);
        if(Input::has("activo") && Input::get("activo") == "on") {
            Activation::complete($user, $activation->code);
        }

        Session::flash('success', trans("users.user_update_confirmation"));

        return Redirect::to("/".Config::get("project.prefix")."/users");
    }

    public function destroy()
    {
        $user = User::find(Input::get("id"));

        if(!$user){
            Session::flash('error', trans("users.user_no_exists"));

            return Redirect::to("/".Config::get("project.prefix")."/users");
        }

        $user->delete();

        Session::flash('success', trans("users.user_delete_confirmation"));

        return Redirect::to("/".Config::get("project.prefix")."/users");
    }

    public function import(){
        return View::make('admin.users.import');
    }

    public function importing()
    {
        try {
            if (Input::hasFile('file')) {
                $extension = Input::file('file')->getClientOriginalExtension();
                $name = uniqid();

                $filename = $name . "." . $extension;
                $path = public_path() . "/upload/importing/" . $filename;

                Input::file('file')->move(public_path() . "/upload/importing/", $filename);
            }

            $reader = Excel::load($path)->get();

            $reader->each(function ($row) {
                $email = $row->get("email");
                $password = $row->get("contrasena");

                $first_name = $row->get("nombres");
                $last_name = $row->get("apellidos");
                $role_name = $row->get("rol");
                $activo = $row->get("activo");

                $credentials = [
                    'login' => $email,
                ];

                $user = Sentinel::findByCredentials($credentials);

                if ($user) {
                    if ($password && $password != "******") {
                        Reminder::removeExpired();
                        $reminder = Reminder::create($user);
                        Reminder::complete($user, $reminder->code, $password);
                    }

                    $user->first_name = $first_name;
                    $user->last_name = $last_name;
                    $user->save();

                } else {
                    Sentinel::register(array(
                        'email' => $email,
                        'password' => $password,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                    ));

                    $user = Sentinel::findByCredentials($credentials);
                }

                $roles = Role::all();
                if($roles) foreach($roles as $role){
                    $role = Sentinel::findRoleByName($role->name);
                    $role->users()->detach($user);
                }

                $role = Sentinel::findRoleByName($role_name);

                if(!$role){
                    Sentinel::getRoleRepository()->createModel()->create([
                        'name' => strtoupper($role_name),
                        'slug' => strtoupper(substr($role_name,0,3))
                    ]);

                    $role = Sentinel::findRoleByName($role_name);
                }

                $role->users()->attach($user);

                $activations = Activations::whereRaw("user_id = $user->id")->get();
                if($activations) foreach($activations as $activation){
                    $activation->delete();
                }

                $activation = Activation::create($user);
                if($activo == 1) {
                    Activation::complete($user, $activation->code);
                }
            });
        }
        catch(Exception $e){
            @unlink($path);

            Session::flash('error', trans("users.user_no_import"));

            return Redirect::to("/".Config::get("project.prefix")."/users");
        }

        @unlink($path);

        Session::flash('success', trans("users.user_import_confirmation"));

        return Redirect::to("/".Config::get("project.prefix")."/users");
    }

    public function export(){
        $users = User::all();

        $data = array(
            array('Email', 'Contraseña', 'Nombres', 'Apellidos', 'Rol', 'Activo')
        );

        $i = 1;
        if($users) foreach($users as $user){
            $data[$i] = array($user->email, "******", $user->first_name, $user->last_name, $user->role(), $user->isActive() ? 1 : 0);

            $i++;
        }

        $extension = "xlsx";
        $name = uniqid();

        $filename = $name . "." . $extension;
        $path = public_path() . "/upload/importing/" . $filename;

        Excel::create("users", function($excel) use($data) {

            $excel->sheet('Sheetname', function($sheet) use($data) {

                $sheet->fromArray($data,"","A1", true, false);

            });

        })->export('xlsx');

        return Response::download($path);
    }
}