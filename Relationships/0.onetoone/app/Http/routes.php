<?php
# @Date:   2018-12-04T16:32:27+01:00
# @Last modified time: 2018-12-04T17:31:19+01:00




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
use App\Address;

Route::get('/insert', function(){

    $user = User::findOrFail(1);

    $address = new Address(['name'=>'12345 Houston av New York 12558']);

    $user->address()->save($address); // save() need an instance when used like this

});

Route::get('/update', function(){

    //I'm gonna find the address then the user

    // $address = Address::where('user_id', 1); // Like this
    $address = Address::whereUserId(1)->first();

    $address->name = "4521 Update avenu, alaska";

    $address->save();

});

Route::get('/read', function(){

    $user = User::findOrFail(1);

    return $user->address->name;

});

Route::get('/delete', function(){

    $user = User::findOrFail(1);

    $user->address()->delete(); //find user address and delete it

    return "done";
});
