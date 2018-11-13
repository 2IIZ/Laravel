<?php
# @Date:   2018-11-09T11:17:17+01:00
# @Last modified time: 2018-11-13T09:36:55+01:00


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;


    // Laravel think automatically that we have a 'posts' table
      // If not "protected $table ='posts'";
    // Laravel think that you have a 'id' by default
      // If not "protected $primaryKey ='id'";

    protected $dates = ['deleted_at']; // property "dates" already exists in laravel

    protected $fillable = [

        'title',
        'content'

    ];



}
