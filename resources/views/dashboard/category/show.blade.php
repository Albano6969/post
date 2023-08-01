@extends('dashboard.layout')

@section('content')

<h1>Detalles de las categorias {{$category->title}}</h1>
    
    <h2>{{$category->title}}</h2>
    <p>{{$category->slug}}</p>
    

@endsection