<?php namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Request;
use Cookie;
use Carbon\Carbon;

class PostsController extends Controller {

    public function __construct(){
        parent::__construct();

        View::share("menu", "posts");
    }

	public function index(){
		$posts = Post::with(
                        'categories',
                        'likes'
                        )
                    ->orderBy('date', 'desc')
                    ->get();

        return View::make('admin/posts.index')->with("posts", $posts);
	}

	public function create(){
        $categories = Category::where('active','1')->get();
        $now = Carbon::now()->format('Y-m-d');

		return View::make('admin/posts.new', compact('categories', 'now'));
	}

	public function store(){
	    $title = Input::has("title") ? Input::get("title") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        $body = Input::has("body") ? Input::get("body") : "";
        $outstanding = Input::has("outstanding") ? (Input::get("outstanding") ? 1 : 0) : 0;
        $image = Request::hasFile('image') ? Request::file('image') : false;
        $validExtensions = ['png', 'jpg', 'jpeg'];
        $categories = Input::has("category_list") ? Input::get("category_list") : [];

        $date = Input::has("date") ? Input::get("date") : "";
        
		if($title == ""){
            Session::flash("error", trans("posts.notifications.field_title_missing"));

            return Redirect::to("/admin/posts/create")->withInput();
        }
        
        if($description == ""){
            Session::flash("error", trans("posts.notifications.field_description_missing"));

            return Redirect::to("/admin/posts/create")->withInput();
        }
        
        if($body == ""){
            Session::flash("error", trans("posts.notifications.field_body_missing"));

            return Redirect::to("/admin/posts/create")->withInput();
        }
        
        if( empty($categories) ){
            Session::flash("error", trans("posts.notifications.field_categories_missing"));

            return Redirect::to("/admin/posts/create")->withInput();
        }
        
        if($image == false){
            Session::flash("error", trans("posts.notifications.field_image_missing"));

            return Redirect::to("/admin/posts/create")->withInput();
        }

        if ( ! in_array($image->guessExtension(), $validExtensions) ) {
            Session::flash("error", trans("posts.notifications.invalid_extension"));

            return Redirect::to("/admin/posts/create")->withInput();
        }

        if ( ! $this->correct_size($image) ) {
            Session::flash("error", trans("posts.notifications.invalid_size"));

            return Redirect::to("/admin/posts/create")->withInput();
        }

        if( $date == ""){
            Session::flash("error", trans("posts.notifications.field_date_missing"));

            return Redirect::to("/admin/posts/create")->withInput();
        }

        //$date = Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');

		$post = Post::create(
			array(
				'title' => $title,
                'description' => $description,
                'body' => $body,
                'outstanding' => $outstanding,
                'image' => $image,
                'date' => $date
			)
		);

        $post->categories()->sync($categories);

        $post->addMainPhoto($image);

		Session::flash('success', trans("posts.notifications.register_successful"));

		return Redirect::to("/admin/posts");
	}

	public function edit($id){
        $post = Post::find($id);

        $now = $post->date;

        if(!$post){
            Session::flash('error', trans("posts.notifications.no_exists"));

            return Redirect::to("/admin/posts");
        }

        $categories = Category::all();

        return View::make('admin/posts.edit', compact('post', 'categories', 'now'));
	}

	public function update(){
        $post = Post::find(Input::get("id"));

        if(!$post){
            Session::flash('error', trans("posts.notifications.no_exists"));

            return Redirect::to("/admin/posts");
        }

        $title = Input::has("title") ? Input::get("title") : "";
        $description = Input::has("description") ? Input::get("description") : "";
        $body = Input::has("body") ? Input::get("body") : "";
        $outstanding = Input::has("outstanding") ? (Input::get("outstanding") ? 1 : 0) : 0;
        $image = Request::hasFile('image') ? Request::file('image') : false;
        $validExtensions = ['png', 'jpg', 'jpeg'];
        $categories = Input::has("category_list") ? Input::get("category_list") : [];

        $date = Input::has("date") ? Input::get("date") : "";
        
        if($title == ""){
            Session::flash("error", trans("posts.notifications.field_title_missing"));

            return Redirect::to("/admin/posts/$post->id/edit")->withInput();
        }
        
        if($description == ""){
            Session::flash("error", trans("posts.notifications.field_description_missing"));

            return Redirect::to("/admin/posts/$post->id/edit")->withInput();
        }
        
        if($body == ""){
            Session::flash("error", trans("posts.notifications.field_body_missing"));

            return Redirect::to("/admin/posts/$post->id/edit")->withInput();
        }
        
        if( empty($categories) ){
            Session::flash("error", trans("posts.notifications.field_categories_missing"));

            return Redirect::to("/admin/posts/$post->id/edit")->withInput();
        }

        if ( $image and ! $this->correct_size($image) ) {
                Session::flash("error", trans("posts.notifications.invalid_size"));

                return Redirect::to("/admin/posts/$post->id/edit")->withInput();
        }

        if ($image) {
            if ( ! in_array($image->guessExtension(), $validExtensions) ) {
                Session::flash("error", trans("posts.notifications.invalid_extension"));

                return Redirect::to("/admin/posts/$post->id/edit")->withInput();
            }

            $post->deleteMainPhoto();
            $post->addMainPhoto($image);
        }

        if( $date == ""){
            Session::flash("error", trans("posts.notifications.field_date_missing"));

            return Redirect::to("/admin/posts/create")->withInput();
        }

        $post->title = $title;
        $post->description = $description;
        $post->body = $body;
        $post->outstanding = $outstanding;
        $post->date = $date;

        $post->save();

        $post->categories()->sync($categories);

        Session::flash('success', trans("posts.notifications.update_successful"));

        return Redirect::to("/admin/posts");
	}

    public function active($id){
        $post = Post::find($id);

        if(!$post){
            Session::flash('error', trans("posts.notifications.no_exists"));

            return Redirect::to("/admin/posts");
        }

        $post->active = 1;
        $post->save();

        Session::flash('success', trans("posts.notifications.activated_successful"));

        return Redirect::to("/admin/posts");
    }

    public function deactive($id){
        $post = Post::find($id);

        if(!$post){
            Session::flash('error', trans("posts.notifications.no_exists"));

            return Redirect::to("/admin/posts");
        }

        $post->active = 0;
        $post->save();

        Session::flash('success', trans("posts.notifications.deactivated_successful"));

        return Redirect::to("/admin/posts");
    }

    public function outstanding($id){
        $post = Post::find($id);

        if(!$post){
            Session::flash('error', trans("posts.notifications.no_exists"));

            return Redirect::to("/admin/posts");
        }

        $post->outstanding = 1;
        $post->save();

        Session::flash('success', trans("posts.notifications.outstanding_successful"));

        return Redirect::to("/admin/posts");
    }

    public function nonoutstanding($id){
        $post = Post::find($id);

        if(!$post){
            Session::flash('error', trans("posts.notifications.no_exists"));

            return Redirect::to("/admin/posts");
        }

        $post->outstanding = 0;
        $post->save();

        Session::flash('success', trans("posts.notifications.nonoutstanding_successful"));

        return Redirect::to("/admin/posts");
    }

    public function like($id){
        $post = Post::find($id);

        $cookieName = 'almer-post-liked-' . $post->id;

        if(!$post){
            Session::flash('error', trans("posts.notifications.no_exists"));

            return response(trans("posts.notifications.no_exists"), 404);
        }

        if ( Cookie::has($cookieName) ) {
            return response('Already voted', 421);
        }

        $post->likes()->save(new Like);


        return response(count($post->likes))->withCookie(cookie()->forever($cookieName, '1'));
    }

    public function destroy(){
        $post = Post::find(Input::get("id"));

        if(!$post){
            Session::flash('error', trans("posts.notifications.no_exists"));

            return Redirect::to("/admin/posts");
        }

        $post->delete();

        Session::flash('success', trans("posts.notifications.delete_successful"));

        return Redirect::to("/admin/posts");
    }

    protected function correct_size($image)
    {
        $minWidth = 780;
        $minHeight = 380;
        list($width, $height) = getimagesize($image);

        return ($width >= $minWidth) and ($height >= $minHeight);
    }
    
}