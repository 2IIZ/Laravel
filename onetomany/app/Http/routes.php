<?php
# @Date:   2018-12-05T08:26:01+01:00
# @Last modified time: 2018-12-05T18:33:13+01:00




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
use App\Post;

Route::get('/create', function(){

    $user = User::findOrFail(1);

    $post = new Post(['title'=>'First post !', 'content'=>'I love Laravel']);

    $user->posts()->save($post); //save the post with the user_id

});


Route::get('/read', function(){

    $user = User::findOrFail(1); //normally you get it from logged user

    foreach ($user->posts as $post) { //loop throuf posts title from the user
      echo $post->title . "<br>";
    }

});

Route::get('/update', function(){

    $user = User::find(1);

    //change the first post ID !
    $user->posts()->whereId(1)->update(['title'=>'Changed title', 'content'=>'lol']); //if you want to user methods add parentesis at posts->()<-

});

Route::get('/delete', function(){

    $user = User::find(1);

    $user->posts()->whereId(1)->delete(); //We haven't the softdelete in this app, so it delete instantly

});
