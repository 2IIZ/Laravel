<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'nom' => 'Stranger',
          'email' => 'strangeruser@domaine.fr',
          'password' => bcrypt('user'),
        ]);

        User::create([
          'nom' => "Iv",
          'email' => 'Iv@n.mail',
          'role' => 'admin',
          'password' => bcrypt('admin'),
        ]);


    }
}
