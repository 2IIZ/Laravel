<?php
# @Date:   2018-12-05T20:06:05+01:00
# @Last modified time: 2018-12-05T20:20:19+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $fillable = ['path'];


    public function imageable(){
      return $this->morphTo();
    }






}
