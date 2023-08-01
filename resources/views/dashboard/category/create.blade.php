@extends('dashboard.layout')

@section('content')

<h1>Crear Categoria</h1>
    
    @include('dashboard.fragment.error-form')

   

    <form action="{{route('category.store')}}" method="post">
    @include('dashboard.category._form')
    </form>
@endsection