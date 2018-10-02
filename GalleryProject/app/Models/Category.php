<?php

//To create this : "php artisan make:model Category"

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $primaryKey = "id_category";

  protected $fillable = [
      'category_name'
  ];
}
