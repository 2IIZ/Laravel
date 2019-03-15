<?php
# @Date:   2018-12-05T18:36:24+01:00
# @Last modified time: 2018-12-05T18:51:37+01:00




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

    public function roles(){
      return $this->belongsToMany('App\Role'); //only this for the many to many
    }
}
