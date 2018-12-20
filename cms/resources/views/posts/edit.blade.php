@extends('layouts.app')


@section('content') {{-- used to put data into the root page (app.blade.php)--}}

<h1>Edit Post</h1>

	<form action="/posts/{{$post->id}}" method="post">
			{{csrf_field()}}

				{{-- hidden input so laravel understand that this will be not a POST but a PUT or PATCH --}}
			<input type="hidden" name="_method" value="PUT">

			<input type="text" name="title" placeholder="Title" value="{{$post->title}}">
			<input type="submit" name="submit" value="Update">

	</form>

	<form action="/posts/{{$post->id}}" method="post">
			{{csrf_field()}}
			
			<input type="hidden" name="_method" value="DELETE">
			<input type="submit" value="Delete">
	</form>

@endsection
