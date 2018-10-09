<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Category::create(['category_name' => 'Animaux']);
      Category::create(['category_name' => 'Arbres']);
      Category::create(['category_name' => 'Gâteaux']);
    }
}
