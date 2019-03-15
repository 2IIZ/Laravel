<?php
# @Date:   2018-10-16T13:33:26+02:00
# @Last modified time: 2018-12-21T16:05:46+01:00


// php artisan make:controller --resource PostsController

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

				$posts = Post::latest();

        return view('posts.index', compact('posts')); //show index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create'); //creating the url for me
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CreatePostRequest $request)
    {



// ___________File upload___________
//      return $request->file('file');

        $input = $request->all();

        if($file = $request->file('file')){

            $name = $file->getClientOriginalName();

            // this function will create images folder - in public directory
            $file->move('images', $name);

            // column v name
            $input['path'] = $name;
        }

        Post::create($input);

// ____________________________________________________

      // $request : we inject this class so we get an object //

			//return $request->get('title'); //when submit get the 'title'
			//return $request->title; // can use it as an object too

        // Verification, validation rules (https://laravel.com/docs/5.8/validation):
      // $this->validate($request, [
      //  'title'=>'required'
      // ]);

        // this way of doing it is easy
			Post::create($request->all()); //every thing from the post will go in the create method and will be persisted to the db

				// Another way of doing it
			// $input = $request->all();
			// $input['title'] = $requeste->title;
			// Post::create($request->all());

			  // Another way of doing it
			// $post = new Post;
			// $post->title = $request->title;
			// $post->save();

			return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
				$post = Post::findOrFail($id);

					// will show show.blade.php and will send $post object so I can use it in the blade.
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\ Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

				return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
				$post->update($request->all());
				return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
				$post = Post::findOrFail($id)->delete();
				return redirect('/posts');
    }

    public function contactView(){

        $people = ['Ivan', 'Jose', 'Croco', 'James', 'Malkyia'];

        return view('contact', compact('people'));

    }

    public function showPost($id, $name, $password){

        // return view('post')->with('id', $id); //with to send $id to the view. Very oldy

        return view('post', compact('id', 'name', 'password'));

    }
}
