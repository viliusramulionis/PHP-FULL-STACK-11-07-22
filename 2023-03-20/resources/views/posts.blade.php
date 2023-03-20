@extends('layouts.main')

@section('turinys')
    <h1>Visi įrašai</h1>
    <div class="row">
        @foreach($posts as $post) 
            <div class="col-4">
                <a href="/post/{{$post->id}}">
                    <img src="{{$post->photo}}" alt="{{$post->title}}" />
                    <h4>{{$post->title}}</h4>
                </a>
            </div>
        @endforeach
    </div>
@stop

