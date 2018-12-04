<?php
# @Date:   2018-12-04T10:10:52+01:00
# @Last modified time: 2018-12-04T10:26:15+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{


    public function posts(){
      return $this->morphedByMany('App\Post', 'taggable');
    }

    public function videos(){
      return $this->morphedByMany('App\Video', 'taggable');
    }
}
