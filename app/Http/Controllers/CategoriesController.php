<?php namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

use App\Models\Category;

class CategoriesController extends Controller {

    public function __construct(){
        parent::__construct();

        View::share("menu", "categories");
    }

	public function index(){
		$categories = Category::all();

        return View::make('admin.categories.index')->with("categories", $categories);
	}

	public function create(){
		return View::make('admin.categories.new');
	}

	public function store(){
	    $name = Input::has("name") ? Input::get("name") : "";
        
		if($name == ""){
            Session::flash("error", trans("categories.notifications.field_name_missing"));

            return Redirect::to("/admin/categories/create")->withInput();
        }
        
        if(Category::whereRaw("name = '$name'")->count() > 0){
            Session::flash("error", trans("categories.notifications.already_register"));

            return Redirect::to("/admin/categories/create")->withInput();
        }

		$category = Category::create(
			array(
				'name' => $name
			)
		);

		Session::flash('success', trans("categories.notifications.register_successful"));

		return Redirect::to("/admin/categories");
	}

	public function edit($id){
        $category = Category::find($id);

        if(!$category){
            Session::flash('error', trans("categories.notifications.no_exists"));

            return Redirect::to("/admin/categories");
        }

        return View::make('admin.categories.edit')->with("category", $category);
	}

	public function update(){
        $category = Category::find(Input::get("id"));

        if(!$category){
            Session::flash('error', trans("categories.notifications.no_exists"));

            return Redirect::to("/admin/categories");
        }

        $name = Input::has("name") ? Input::get("name") : "";
        
        if($name == ""){
            Session::flash("error", trans("categories.notifications.field_name_missing"));

            return Redirect::to("/admin/categories/$category->id/edit")->withInput();
        }
        
        if(Category::whereRaw("name = '$name' AND id <> $category->id")->count() > 0){
            Session::flash("error", trans("categories.notifications.already_register"));

            return Redirect::to("/admin/categories/$category->id/edit")->withInput();
        }

        $category->name = $name;

        $category->save();

        Session::flash('success', trans("categories.notifications.update_successful"));

        return Redirect::to("/admin/categories");
	}

	public function active($id){
        $category = Category::find($id);

        if(!$category){
            Session::flash('error', trans("categories.notifications.no_exists"));

            return Redirect::to("/admin/categories");
        }

        $category->active = 1;
        $category->save();

        Session::flash('success', trans("categories.notifications.activated_successful"));

        return Redirect::to("/admin/categories");
	}

	public function deactive($id){
        $category = Category::find($id);

        if(!$category){
            Session::flash('error', trans("categories.notifications.no_exists"));

            return Redirect::to("/admin/categories");
        }

        $category->active = 0;
        $category->save();

        Session::flash('success', trans("categories.notifications.deactivated_successful"));

        return Redirect::to("/admin/categories");
    }

    public function destroy(){
        $category = Category::find(Input::get("id"));

        if(!$category){
            Session::flash('error', trans("categories.notifications.no_exists"));

            return Redirect::to("/admin/categories");
        }

        $category->delete();

        Session::flash('success', trans("categories.notifications.delete_successful"));

        return Redirect::to("/admin/categories");
    }

    protected function correct_size($image)
    {
        $minWidth = 640;
        $minHeight = 430;
        list($width, $height) = getimagesize($image);

        return ($width >= $minWidth) and ($height >= $minHeight);
    }

}