<?php
# @Date:   2018-10-02T10:41:57+02:00
# @Last modified time: 2018-10-16T09:05:27+02:00




//To create this : "php artisan make:model Image"

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $primaryKey = "id_image";

  public function user() {
      return $this->belongsTo('App\Models\User');
      
  }

}
