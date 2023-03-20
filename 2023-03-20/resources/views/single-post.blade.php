@extends('layouts.main')

@section('turinys')
    <h1>{{$post->title}}</h1>
    <img src="{{$post->photo}}" alt="{{$post->title}}" />
    <div class="content">
        {{$post->content}}
    </div>
@stop

