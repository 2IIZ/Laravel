<?php
# @Date:   2018-12-04T09:34:25+01:00
# @Last modified time: 2018-12-04T09:52:43+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function imageable(){ //imageable following convention

          return $this->morphTo();

    }
}
