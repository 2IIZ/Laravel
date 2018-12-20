@extends('layouts.app')


@section('content') {{-- used to put data into the root page (app.blade.php)--}}

<h1>Create Post</h1>

	<form action="/posts" method="post">

		{{csrf_field()}}
			<input type="text" name="title" placeholder="Title">
			<input type="submit" name="submit">

	</form>

@endsection
