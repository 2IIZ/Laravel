<?php
# @Date:   2018-12-05T18:36:24+01:00
# @Last modified time: 2018-12-05T19:49:10+01:00




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\User;
use App\Role;

Route::get('/create', function(){

    $user = User::find(1);

    $role = new Role(['name'=>'Admin']);

    $user->roles()->save($role); //table roles filled up with user(1) = admin

    //The pivot table is automaticly filled up

});

Route::get('/read', function(){

    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {
        return $role->name;
    }

});

Route::get('/update', function(){

    $user = User::findOrFail(1);

    $userRole = $user->roles->first()->name;

    if($user->has('roles')){ //if he had any role
        foreach ($user->roles as $role) {
            if($role->name == $userRole){ //if one of his roles is 'Admin'
                $role->name = "subscriber";
                $role->save();
            }
        }
    }

});

Route::get('/delete', function(){

    $user = User::findOrFail(1);

    $user->roles()->delete(); //delete all

});


Route::get('/attach', function(){

    $user = User::findOrFail(1);

    $user->roles()->attach(2); //role number 2 attach to user number 1

});

Route::get('/detach', function(){

    $user = User::findOrFail(1);

    //without number       V   it will detach everything from the user in the pivot table.
    $user->roles()->detach(2); //role number 2 detach from user number 1

});

Route::get('/sync', function(){

    $user = User::findOrFail(1);

    //will delete all other one roles, can make multiples roles in an array [2,3]
    $user->roles()->sync([3]); //this will this the user 1, with the role 3

});
