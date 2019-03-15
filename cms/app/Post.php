<?php
# @Date:   2018-11-09T11:17:17+01:00
# @Last modified time: 2018-12-04T10:25:45+01:00


namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public $directory = '/images/';

    use SoftDeletes;


    // Laravel think automatically that we have a 'posts' table
      // If not "protected $table ='posts'";
    // Laravel think that you have a 'id' by default
      // If not "protected $primaryKey ='id'";

    protected $dates = ['deleted_at']; // property "dates" already exists in laravel

    protected $fillable = [

        'title',
        'content',
        'path'

    ];

    //Inverse relation One to One
    public function user(){

        return $this->belongsTo('App\User'); //this user belongsTo this post

    }

    public function photos(){

      return $this->morphMany('App\Photo', 'imageable');

    }

    public function tags(){

        return $this->morphToMany('App\Tag', 'taggable');

    }

//____________________Query Scopes__________________________

    public static function scopeLatest($query){

      return $query->orderBy('id', 'asc')->get(); // will get the newer first

    }
//__________________________________________________________


//____________________Query Scopes__________________________

    public function getPathAttribute($value){

        return $this->directory . $value;

    }
//__________________________________________________________


}


