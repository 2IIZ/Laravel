<?php
# @Date:   2018-10-16T09:23:15+02:00
# @Last modified time: 2018-12-21T15:49:41+01:00


/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
*/
//insert data in SQL
Route::get('/insert', function(){

    DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'Laravel best framework ever !']);

});

Route::get('/read', function(){
    $result = DB::select('select * from posts where id = ?', [1]);

    return $result;

    // foreach($result as $post){
    //   $overall = "$post->title, $post->content";
    //
    //   return $overall;
    // }
});

Route::get('/update', function(){

    $updated = DB::update('update posts set title = "Update title" where id = ?', [1]);

    return $updated;
});

Route::get('/delete', function(){

    $deleted = DB::delete('delete from posts where id = ?', [1]);

    return $deleted;
});


/*
|--------------------------------------------------------------------------
| ELOQUENET
|--------------------------------------------------------------------------
*/
use App\Post;

//read data
Route::get('/readEloquent', function(){

    $posts = Post::all(); //pulling all records

    foreach ($posts as $post) {
      return $post->title;
    }
});

//retrieve data
Route::get('/findEloquent', function(){

    $post = Post::find(2); //find id number 2

    return $post->title;
});

//where()
Route::get('/findEloquentConstraint', function(){
  $posts = Post::where('id', 2)->orderBy('id', 'descending')->take(1)->get();

  return $posts;

});

Route::get('/findMore', function(){

    // $posts = Post::findOrFail(1); //find a record, if not send a error "404. Sorry, the page you are looking for could not be found."
    //
    // return $posts;

    $posts = Post::where('id', '<', 50)->firstOrFail();

    return $posts;

});

//basic insert in Eloquent
Route::get('/insertEloquent', function(){

    $post = new Post;

    $post->title = 'new TITLE Eloquent';
    $post->content = "Wow it's really cool ! very easy and fast";

    $post->save();

});

//bascic insert where you can modify the content like a update
Route::get('/insertEloquentModifing', function(){

    $post = Post::find(2);

    $post->title = 'modified';
    $post->content = "modifed";

    $post->save(); //the teacher use this most of the time for update

});

// create data in laravel
Route::get('/createData', function(){

    Post::create(['title'=>'the create method',
                'content' => "I'm learning a lot"]);

                // will throw an error : MassAssignmentException in Model.php line 452: TITLE
                // that why the laravel think it's not safe to insert data
                // 1. go to "Post.php" the class of the table you want to "create"
                // 2. change "protected $fillable = [title, content];"

});

// update Data in Laravel with Eloquent
Route::get('/updateEloquent', function(){

    Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'New PHP Title',
                                                       'content' => 'I like my teacher Edwin x)']);
});

// deleting in Eloquent
Route::get('/deleteEloquent', function(){

    $post = Post::find(2);

    $post->delete();

});

// deleting in one line
Route::get('/deleteEloquentOther', function(){

    Post::destroy(3); // you know the id, then more simple to delete a entire line if you wish

});

// deleting multiple
Route::get('/deleteEloquentMultiple', function(){

    Post::destroy([4,5]); // you know the id, then more simple to delete a entire line if you wish

});

// explaanation of softDeletes here
Route::get('/softDeletes', function(){

  // softDeletes -> to have a table in cache whenever I delete it, if I want to recover it
  //    1. go to your table class "Post.php"
  //        use Illuminate\Database\Eloquent\SoftDeletes;
  //        in the class : "use SoftDelete;"
  //    2. php artisan make:migration add_deleted_at_column_to_posts_table --table=posts
  //        update  de up() method and down() method

    Post::find(2)->delete();

});

// read data in the trash
Route::get('/readSoftDeletes', function(){

  // Do not show nothing because it's in the trash
  // (if 'deleted_at' column is not null, that is to say fill with a date) -> will not showup in a regular query

    // $post = Post::find(2);

    // $post = Post::withTrashed()->where('id', 2)->get(); // access the trash, with condition

    $post = Post::onlyTrashed()->get(); // all the trash (deleted_at != null)

    return $post;
});

// easy way of restoring data from the trash
Route::get('/restoreSoftDeletes', function(){

    Post::withTrashed()->where('is_admin', 0)->restore();

});

// delete data from the trash permanently
Route::get('/softDeletesForceDelete', function(){

    // $post = Post::withTrashed()->where('id', 1)->forceDelete(); //delete even with "deleted_at" column null

    $post = Post::onlyTrashed()->where('id', 3)->forceDelete(); // delete only what's on trash

    return $post;
});

/*
|--------------------------------------------------------------------------
| ELOQUENET RELATIONSHIPS
|--------------------------------------------------------------------------
*/
use App\User;
use App\Country;
use App\Photo;
use App\Tag;

// One to One relationship
Route::get('/oneToOne/{id}', function($id){

    // 1. Create in the db a user_id, in the foreign Table .(Post)., so we know from who is the post.
    // 2. Add in "User.php" a function .(post).
    //    in the fun,  use "hasOne()" for making the relationship. From User to the Post Table.

    return User::find($id)->post->title; //you can access columns like there are properties
});

//Reverse relation One to One
Route::get('/oneToOneReverse/{id}', function(){
    //1. added to the Post.php belongsTo
    return Post::find($id)->user->name;
});

//One to Many relationship
Route::get('/oneToMany', function(){

    // add hasMany() in User.php
    $user = User::find(1); //user from id 1

    foreach($user->posts as $post){
        //return all title of the user
        echo $post->title . "<br>";
    }
});

//Many To Many RELATIONSHIPS
Route::get('/manyToMany/{id}', function($id){
    // creation of the Role table "php artisan make:model Role -m"
    // making the pivot table
    // name convention : alphabetical order and in singular "role_user"
    // creation of pivot table : "php artisan  make:migration create_users_roles_table --create=role_user"
    // added roles and role_user columns.
    // added belongsToMany() int User.php

    echo "Asking for the user, to retrieve his role : ";

    $user = User::find($id);

    // $user = User::find($id)->roles()->orderBy('name')->get(); // easly can make a where($id) easly in one line.
    // return $user;

    foreach($user->roles as $role){
      return $role->name;
    }
});

// accessing the intermediate table (pivot table)
Route::get('/user/pivot', function(){

    $user = User::find(1);

    foreach($user->roles as $role) {

      return $role->pivot;

    }
});

// get a post from user from country table
Route::get('/user/country', function(){

    $country = Country::find(1);

    foreach($country->posts as $post){
      echo $post->title; //Found the post from country where user is 1
    }
});

// Polymorphic relations
Route::get('/user/photos', function(){

  $user = User::find(1);

  foreach($user->photos as $photo){

      return $photo->path; //found user photo

  }

});

//found post photo from user
Route::get('/post/photos', function(){

  $post = Post::find(1);

  foreach($post->photos as $photo){

      echo $photo->path . '<br>'; //found post photo from user 1

  }

});

//found the owner of the image
Route::get('/photo/{id}/post', function($id){

    $photo = Photo::findOrFail($id);

    return $photo->imageable;

});

// Polymorphic Many to Many
Route::get('/post/tag', function(){

    $post = Post::find(1);

    foreach ($post->tags as $tag) {
      echo $tag->name;
    }

});

Route::get('/tag/post', function(){

    $tag = Tag::find(2);

    foreach ($tag->posts as $post) {
      echo $post->title;
    }

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
|
| To know all my routes : php artisan route:list
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
Route::get('/post/{id}/{name}', function($id, $name){

  return "this is post number ". $id . " ". $name;

});

// //shorter url
// Route::get('admin/posts/example', array('as'->'admin.home' function(){
//
//     // <a href= "route('admin.home')"> CLICK HERE </a>
//     $url = route("admin.home");
//     return "this url is". $url;
//
// }));

/*
|--------------------------------------------------------------------------
| CRUD APPLICATION
|--------------------------------------------------------------------------
*/

Route::get('/post/{id}', 'PostsController@index'); // @index : go directly to the index method

// middleware for security purpose
Route::group(['middleware'=>'web'], function(){});

//CRUD Application
Route::resource('/posts', 'PostsController'); //no need for asking @index. 'resource' ask for all method of basic method of 'ressource' (PostsController.php)


Route::get('contact', 'PostsController@contactView');

Route::get('posts/{id}/{name}/{password}', 'PostsController@showPost'); // passing data to views
