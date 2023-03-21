@extends('layouts.main')

@section('turinys')
    <h1>{{$post->title}}</h1>
    <img src="{{$post->photo}}" alt="{{$post->title}}" />
    <div class="info">
        <span>Autorius: {{$post->user->name}}</span>
        <span>Komentarų skaičius: {{$post->comments_count}}</span>
        <span>Sukūrimo data: {{date('Y-m-d', strtotime($post->created_at))}}</span>
    </div>
    <div class="content">
        {!! $post->content !!}
    </div>
@stop

