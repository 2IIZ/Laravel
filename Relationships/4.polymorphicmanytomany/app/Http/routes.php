<?php
# @Date:   2018-12-06T07:04:21+01:00
# @Last modified time: 2018-12-06T08:09:53+01:00




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

use App\Post;
use App\Video;
use App\Tag;

Route::get('/create', function (){

    $tag1 = Tag::find(1);
    $tag2 = Tag::find(2);

    $post = Post::create(['name'=>'First Post']); // we create a Post
    $post->tags()->save($tag1); // and we associate it with tag 1

    $video = Video::create(['name'=>'video.mp4']); //same with video
		$video->tags()->save($tag2); // tag 2
});


Route::get('/read', function(){

		$post = Post::findOrFail(5);


		foreach($post->tags as $tag) { //lets pull out his relationship "$post->tags"
				echo $tag; //all tags where the id post is 5
		}

});


Route::get('/update', function(){

		$post = Post::findOrFail(5); //find post 5

		foreach($post->tags as $tag) { //lets pull out his relationship "$post->tags"
				//we are in the Post's tags
				return $tag->whereName('Nature')->update(['name'=>'Natura']); //change the Post's tag to Natura

		}

});

Route::get('/update-two', function(){

		$post = Post::findOrFail(5); //find post 5, his tag is 1

		$tag = Tag::find(2); //tag 2 = Car

		//$post->tags()->save($tag); // add a tag to the post so now he have 1 and 2

		//$post->tags()->attach($tag); // same as last line

		$post->tags()->sync([1]); //replace all tags of the post for this ID 1
});


Route::get('/delete', function(){

	$post = Post::findOrFail(5);

	foreach ($post->tags as $tag) {
			$tag->whereId(2)->delete(); // delete the tag number 2 who's Car
	}
});
