<?php
# @Date:   2018-10-16T09:23:17+02:00
# @Last modified time: 2018-11-09T09:37:47+01:00




use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

// This is the Blueprint, we have to run it to have the table in the DB

     // When we run this with "php artisan" we get the table created
    public function up()
    {
        // ------------TableName
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('users'); //Drop the table
    }
}
