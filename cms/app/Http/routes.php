<?php
# @Date:   2018-10-16T09:23:15+02:00
# @Last modified time: 2018-11-06T09:11:02+01:00


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

// Route::get('/about', function () {
//   return "Hi about page !";
// });

// Route::get('/contact', function () {
//   return "Hi contacts !";
// });


// //passing variables
// Route::get('/post/{id}/{name}', function($id, $name){
//
//   return "this is post number ". $id . " ". $name;
//
// });


// //shorter url
// Route::get('admin/posts/example', array('as'->'admin.home' function(){
//
//     // <a href= "route('admin.home')"> CLICK HERE </a>
//     $url = route('admin.home');
//     return "this url is". $url;
//
// }));

// To know all my routes : php artisan route:list

// Route::get('/post/{id}', 'PostsController@index'); // @index : go directly to the index method

Route::resource('posts', 'PostsController'); //no need for asking @index. 'resource' ask for all method of basic method of 'resource'
