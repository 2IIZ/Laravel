<?php
# @Date:   2018-12-04T16:32:27+01:00
# @Last modified time: 2018-12-04T17:12:39+01:00




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

    public function address(){
      return $this->hasOne('App\Address');
    }
}
