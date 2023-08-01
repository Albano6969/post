@extends('dashboard.layout')

@section('content')

<h1>Crear Post</h1>
    
    @include('dashboard.fragment.error-form')

   

    <form action="{{route('post.store')}}" method="post">
    @include('dashboard.post._form')
    </form>
@endsection