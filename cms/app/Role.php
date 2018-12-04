<?php
# @Date:   2018-11-16T10:01:38+01:00
# @Last modified time: 2018-12-04T08:57:00+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    //manyToMany Inverse
    public function users(){

        return $this->belongsToMany('App\User');

    }
}
