<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Image;

class Post extends Model {

	protected $fillable = ['title','description','body','outstanding','image', 'date'];

    protected $basePath = 'multimedia/posts';

    protected $lgWidth = 1100;
    protected $lgHeight = 450;

    protected $mdWidth = 540;
    protected $mdHeight = 290;
    
    protected $smWidth = 345;
    protected $smHeight = 290;

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function addMainPhoto($image)
    {
        $postPath = $this->path();
        
        $fileName = Str::slug($image-> getClientOriginalName()) . time() . '.' . $image->  getClientOriginalExtension();

        if ( ! file_exists($postPath) and ! is_dir($postPath) ) {
            mkdir($postPath);
        }

        $image->move($postPath, $fileName);

        Image::make($postPath . '/' . $fileName)
             ->fit($this->lgWidth, $this->lgHeight, function($constraint) {
                $constraint->upsize();
             })
             ->save($postPath . '/' . $fileName);

        Image::make($postPath . '/' . $fileName)
             ->fit($this->mdWidth, $this->mdHeight, function($constraint) {
                $constraint->upsize();
             })
             ->save($postPath . '/md-' . $fileName);

        Image::make($postPath . '/' . $fileName)
             ->fit($this->smWidth, $this->smHeight, function($constraint) {
                $constraint->upsize();
             })
             ->save($postPath . '/sm-' . $fileName);

        $this->image = $fileName;
        $this->save();
    }

    public function path()
    {
        return $this->basePath . '/' . $this->id;
    }

    public function delete()
    {
        $this->deleteMainPhoto();

        parent::delete();
    }

    public function deleteMainPhoto()
    {
        $postPath = $this->path();

        if (file_exists($postPath . '/' . $this->image)) {
            unlink($postPath . '/' . $this->image);
        }

        if (file_exists($postPath . '/md-' . $this->image)) {
            unlink($postPath . '/md-' . $this->image);
        }

        if (file_exists($postPath . '/sm-' . $this->image)) {
            unlink($postPath . '/sm-' . $this->image);
        }
    }

}