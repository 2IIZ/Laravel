<?php
# @Date:   2018-10-16T09:23:15+02:00
# @Last modified time: 2018-11-13T10:33:39+01:00

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
Route::get('/create', function(){

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

// Route::get('/post/{id}', 'PostsController@index'); // @index : go directly to the index method

// Route::resource('posts', 'PostsController'); //no need for asking @index. 'resource' ask for all method of basic method of 'resource'
//
// Route::get('contact', 'PostsController@contactView');
//
// Route::get('posts/{id}/{name}/{password}', 'PostsController@showPost'); // passing data to views
