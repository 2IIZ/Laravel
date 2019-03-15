@extends('layouts.app')


@section('content') {{-- used to put data into the root page (app.blade.php)--}}

	<ul>
			@foreach($posts as $post)

				<div class="image-container">

					<img height="100" src="{{$post->path}}" alt="">
					
				</div>


				<li><a href="{{route('posts.show', $post->id)}}"> {{$post->title}} </a></li>

			@endforeach
	</ul>


@endsection
