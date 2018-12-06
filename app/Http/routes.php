<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'index', 'uses' => 'FrontController@index']);
Route::get('/nosotros', ['as' => 'aboutus', 'uses' => 'FrontController@aboutus']);
Route::get('/fiscal', ['as' => 'fiscal', 'uses' => 'FrontController@fiscal']);
Route::get('/auditoria', ['as' => 'audit', 'uses' => 'FrontController@audit']);
Route::get('/contable', ['as' => 'countable', 'uses' => 'FrontController@countable']);
Route::get('/legal', ['as' => 'legal', 'uses' => 'FrontController@legal']);
Route::get('/contacto', ['as' => 'contact', 'uses' => 'FrontController@contact']);

Route::get('/blog', ['as' => 'blog', 'uses' => 'FrontController@blog']);
Route::get('/post/{id}/{slug}', ['as' => 'detail', 'uses' => 'FrontController@detail']);
Route::get('/resultados-ajax', ['as' => 'results-ajax','uses' => 'FrontController@resultsAjax']);
Route::get('/articulos', ['as' => 'results', 'uses' => 'FrontController@results']);
Route::post("/like/{id}", "PostsController@like");




Route::post('/send-contact', ['as' => 'sendContact', 'uses' => 'FrontController@sendContact']);

Route::get('/admin', function(){
    if(Sentinel::check()){
        return view('backend.index');
    }

    return Redirect::to("/admin/login");

});


Route::group(['prefix' => 'admin'], function()
{
    Route::get('/', "LoginController@index");
    Route::get('login', "LoginController@loginForm");
    Route::post('login', "LoginController@login");
    Route::get('logout', "LoginController@logout");
    Route::post('forgot', "LoginController@forgot");
    Route::get('login/{id}/{code}/reset', "LoginController@reset");
    Route::post('login/reset', "LoginController@update");
    Route::get('login/{id}/{code}/activate', "LoginController@activate");

    Route::get('/home', "UsersController@index");

    Route::get('/users', "UsersController@index");
    Route::get('/users/create', "UsersController@create");
    Route::post('/users/store', "UsersController@store");
    Route::get('/users/{id}/edit', "UsersController@edit");
    Route::post('/users/update', "UsersController@update");
    Route::post('/users/update_pass', "UsersController@update_pass");
    Route::post('/users/delete', "UsersController@destroy");


/*  Route::get('/users/import', "UsersController@import");
    Route::post('/users/import', "UsersController@importing");

    Route::get('/users/export', "UsersController@export");
    Route::post('/users/export', "UsersController@exporting");

    Route::get('/roles', "RolesController@index");
    Route::get('/roles/create', "RolesController@create");
    Route::post('/roles/store', "RolesController@store");
    Route::get('/roles/{id}/edit', "RolesController@edit");
    Route::post('/roles/update', "RolesController@update");
    Route::post('/roles/delete', "RolesController@destroy");*/

    Route::get("/posts", "PostsController@index");
    Route::get("/posts/create", "PostsController@create");
    Route::post("/posts/store", "PostsController@store");
    Route::get("/posts/{id}/edit", "PostsController@edit");
    Route::post("/posts/update", "PostsController@update");
    Route::get("/posts/{id}/active", "PostsController@active");
    Route::get("/posts/{id}/deactive", "PostsController@deactive");
    Route::get("/posts/{id}/outstanding", "PostsController@outstanding");
    Route::get("/posts/{id}/nonoutstanding", "PostsController@nonoutstanding");
    Route::get("/posts/{id}/like", "PostsController@like");
    Route::post("/posts/delete", "PostsController@destroy");

    Route::get("/categories", "CategoriesController@index");
    Route::get("/categories/create", "CategoriesController@create");
    Route::post("/categories/store", "CategoriesController@store");
    Route::get("/categories/{id}/edit", "CategoriesController@edit");
    Route::post("/categories/update", "CategoriesController@update");
    Route::get("/categories/{id}/active", "CategoriesController@active");
    Route::get("/categories/{id}/deactive", "CategoriesController@deactive");
    Route::post("/categories/delete", "CategoriesController@destroy");
});