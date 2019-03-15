<?php
# @Date:   2018-12-06T07:10:33+01:00
# @Last modified time: 2018-12-06T07:17:02+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $fillable = ['name'];


    //added in Taggable and Video
    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }

}
