@extends('layouts.app')


@section('content') {{-- used to put data into the root page (app.blade.php)--}}

<h1>Edit Post</h1>

	  {{-- this is for update the data - PATCH is very secure --}}
		{!! Form::model($post, ['method'=>'PATCH', 'action'=>['PostsController@update', $post->id]]) !!}
			{{csrf_field()}}

			{!! Form::label('title', 'Title : ') !!}
			{!! Form::text('title', null, ['class'=>'form-control']) !!}

			{!! Form::submit('Update Post',['class'=>'btn btn-info']) !!}

		{!! Form::close() !!}


		{!! Form::open(['method'=>'DELETE', 'action'=> ['PostsController@destroy', $post->id]]) !!}
			{{csrf_field()}}

			{!! Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}

		{!! Form::close() !!}


@endsection
