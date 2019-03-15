<!--
# @Date:   2018-11-06T09:36:04+01:00
# @Last modified time: 2018-11-06T10:27:34+01:00
!-->

@extends('layouts.app')


@section('content')

  <div class="content">
      <div class="title">Contact</div>

      @if(count($people))
          <ul>
              @foreach($people as $person)

                  <li>{{$person}}</li>

              @endforeach
          </ul>
      @endif
  </div>

@stop

@section('footer')

{{-- <script>alert('Hello visiter')</script> --}}

@stop
