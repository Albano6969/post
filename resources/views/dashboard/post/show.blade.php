@extends('dashboard.layout')

@section('content')

<h1>Detalles del Post {{$post->title}}</h1>
    
    <h2>{{$post->title}}</h2>
    <p>{{$post->posted}}</p>
    <p>{{$post->description}}</p>
    <div>{{$post->content}}</div>

@endsection