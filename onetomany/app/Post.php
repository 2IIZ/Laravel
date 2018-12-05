<?php
# @Date:   2018-12-05T08:32:12+01:00
# @Last modified time: 2018-12-05T08:37:39+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // this is mass assignment, saying to laravel that he can modify this columns
    protected $fillable = [

      'title',
      'content'

    ];
}
