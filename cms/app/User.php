<?php
# @Date:   2018-10-16T09:23:15+02:00
# @Last modified time: 2018-11-16T11:10:58+01:00




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

      return $this->belongsToMany('App\Role');

    }

}
