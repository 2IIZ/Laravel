<?php
# @Date:   2018-12-05T20:05:57+01:00
# @Last modified time: 2018-12-05T20:20:53+01:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name'];

    public function photos(){
        $this->morphMany('App\Photo', 'imageable');
    }
}
