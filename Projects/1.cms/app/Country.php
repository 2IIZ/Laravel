<?php
# @Date:   2018-12-04T09:04:20+01:00
# @Last modified time: 2018-12-04T09:21:23+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    public function posts(){

      return $this->hasManyThrough('App\Post', 'App\User'); //this method uses two tables
      //relating this two table to pull out information


    }

}
