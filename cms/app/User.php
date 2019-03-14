<?php
# @Date:   2018-10-16T09:23:15+02:00
# @Last modified time: 2018-12-20T16:44:20+01:00




namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // added function for the one to one relationship
    public function post(){

        return $this->hasOne('App\Post'); // will go to the "Post" class and search automatically for the "user_id"

        // return $this->hasOne('App\Post', 'the_user_id'); // to search another id or column
    }

    //added function for the One to Many relationship
    public function posts(){

      return $this->hasMany('App\Post');

    }

    //added function manyToMany relationship
    public function roles(){

      return $this->belongsToMany('App\Role')->withPivot('created_at');

			//To customize tables name and columns follow the format below
			//return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    }

    public function photos(){

      return $this->morphMany('App\Photo', 'imageable');

    }

    // accessors. Camel case, and Attribute all the time. Is the convention
    public function getNameAttribute($value){

      return ucfirst($value);

    }

    public function setNameAttribute($value){

      // every time I save data in the database, the first letter will be uppercase
      $this->attributes['name'] = ucfirst($value);

    }

}
