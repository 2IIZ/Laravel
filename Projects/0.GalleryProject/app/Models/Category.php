<?php

//To create this : "php artisan make:model Category"

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $primaryKey = "id_category";
  protected $table = "categories";
  protected $fillable = [ 'category_name' ];

  public function user() {
      return $this->belongsTo('App\Models\User');
  }
}
