<?php
# @Date:   2018-12-05T19:52:56+01:00
# @Last modified time: 2018-12-05T20:44:42+01:00




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

use App\Staff;
use App\Photo;

Route::get('/create', function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->create(['path'=>'example.jpg']); //staff 1 has now a photo named example.jpg

});

Route::get('/read', function(){

    $staff = Staff::findOrFail(1);

    foreach ($staff->photos as $photo)  {
      echo $photo->path . '<br>';
    }


});

Route::get('/update', function(){

    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(2)->first(); //take the photo ID 2 of the staff member 1

    $photo->path = "Updated Example.jpg"; //change the value of path

    $photo->save(); //save it

});

Route::get('/delete', function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->first()->delete(); //delete the first entry of the staff's photos

});


Route::get('/assign', function(){

   $staff = Staff::findOrFail(1);

   $photo = Photo::findOrFail(6); //taking photo id 6

   $staff->photos()->save($photo); //it is assinging the photo 6 to the staff number 1

});

Route::get('/unassign', function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(6)->update(['imageable_id'=>'', 'imageable_type'=>'']); // unassing the previous assign x)

});
