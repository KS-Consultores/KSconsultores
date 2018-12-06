<?php namespace App\Models;

use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    //protected $fillable = ['email','first_name','last_name'];

    public static function rules() {
        return [
            'email' => 'required',
            'name'     => 'required',
            'surname'    => 'required'
        ];

    }

    public function role(){
        $relation = RoleUser::whereRaw("user_id = $this->id");

        if($relation->count()> 0){
            $relation = $relation->first();
            $role = Role::find($relation->role_id);
            return $role->name;
        }

        return "";
    }

    public function isActive(){
        $credentials = [
            'login' => $this->email,
        ];

        $user = Sentinel::findByCredentials($credentials);

        $activation = Activation::exists($user);

        if($activation && $activation->completed == 0){
            return false;
        }

        return true;
    }
}
