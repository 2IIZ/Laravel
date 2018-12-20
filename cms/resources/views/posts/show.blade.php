@extends('layouts.app')


@section('content') {{-- used to put data into the root page (app.blade.php)--}}

	<h1><a href="{{route('posts.edit', $post->id)}}"> {{$post->title}} </a></h1>


@endsection
