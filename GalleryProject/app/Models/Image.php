<?php

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
