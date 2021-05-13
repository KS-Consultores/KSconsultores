<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Role;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class RolesController extends Controller {

    public function __construct(){
        parent::__construct();

        View::share("menu", "users");
        View::share("submenu", "roles");
    }

    public function index()
    {
        $roles = Role::all();

        return View::make('admin.roles.index')->with("menu","")->with("submenu","")->with("roles", $roles);
    }

	public function create()
	{
        $roles = Role::all();

        return View::make('admin.roles.new')->with("menu","")->with("submenu","")->with("roles", $roles);
	}

	public function store()
	{
        $name = Input::get("name");

        if(Role::whereRaw("name = '$name'")->count() == 0){
            Sentinel::getRoleRepository()->createModel()->create([
                'name' => strtoupper($name),
                'slug' => strtoupper(substr($name,0,3))
            ]);

            Session::flash('success', trans("users.role_register_confirmation"));

            return Redirect::to("/".Config::get("project.prefix")."/roles");
        }
        else{
            Session::flash('error', trans("users.role_already_register"));

            return Redirect::to("/".Config::get("project.prefix")."/roles/create")->withInput();
        }
	}

	public function edit($id)
	{
        $role = Role::find($id);

        if(!$role){
            Session::flash('error', trans("users.role_no_exists"));

            return Redirect::to("/".Config::get("project.prefix")."/roles");
        }

        return View::make('admin.roles.edit')->with("menu","")->with("submenu","")->with("role", $role);
	}

	public function update()
	{
        $role = Role::find(Input::get("id"));

        if(!$role){
            Session::flash('error', trans("users.role_no_exists"));

            return Redirect::to("/".Config::get("project.prefix")."/roles");
        }

        $role->name = Input::get("name");
        $role->save();

        Session::flash('success', trans("users.role_update_confirmation"));

        return Redirect::to("/".Config::get("project.prefix")."/roles");
	}

	public function destroy()
	{
        $role = Role::find(Input::get("id"));

        if(!$role){
            Session::flash('error', trans("users.role_no_exists"));

            return Redirect::to("/".Config::get("project.prefix")."/roles");
        }

        $role = Sentinel::findRoleByName($role->name);

        if($role->users()->count() > 0){
            Session::flash('error', trans("users.role_no_delete"));

            return Redirect::to("/".Config::get("project.prefix")."/roles");
        }

        $role->delete();

        Session::flash('success', trans("users.role_delete_confirmation"));

        return Redirect::to("/".Config::get("project.prefix")."/roles");
	}

}
