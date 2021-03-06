@extends('layouts.app')


@section('content') {{-- used to put data into the root page (app.blade.php)--}}

<h1>Create Post</h1>

{{-- HTML MODE  --}}

	{{-- <form action="/posts" method="post">
		<input type="text" name="title" placeholder="Title">
		<input type="submit" name="submit">
	</form> --}}


	{{-- LARAVEL MODE  --}}
<div class="container ">

	{!! Form::open(['method'=>'POST', 'action'=>'PostsController@store', 'files'=>true]) !!}
		{{csrf_field()}}

		<div class="form-group">
			{{-- first param is the var, second param is the value --}}
			{!! Form::label('title', 'Title : ') !!}
			{{-- first param is var from database, second default, anything you want  --}}
			{!! Form::text('title', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::file('file', ['class'=>'form-control']) !!}
		</div>

		{!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}

	{!! Form::close() !!}

</div>


	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>

	@endif


@endsection
