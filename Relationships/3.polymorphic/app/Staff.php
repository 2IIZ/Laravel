<?php
# @Date:   2018-12-05T20:05:42+01:00
# @Last modified time: 2018-12-05T20:20:51+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{

    protected $fillable = ['name'];

    public function photos(){
      return $this->morphMany('App\Photo', 'imageable');
    }
}
