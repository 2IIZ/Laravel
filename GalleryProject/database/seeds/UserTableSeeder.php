<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //To seed the base with data : php artisan db:seed
    public function run()
    {
        User::create([
          'name' => 'Stranger',
          'email' => 'strangeruser@domaine.fr',
          'password' => bcrypt('user'),
        ]);

        User::create([
          'name' => "Iv",
          'email' => 'Iv@n.mail',
          'role' => 'admin',
          'password' => bcrypt('admin'),
        ]);


    }
}
