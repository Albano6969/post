@extends('dashboard.layout')

@section('content')

<h1>Actualizar Categorias {{$category->title}}</h1>
    
    @include('dashboard.fragment.error-form')

   

    <form action="{{route('category.update', $category->id)}}" method="post" enctype="multipart/form-data">
    
    @method("PATCH")
        @include('dashboard.category._form', ["task" => "edit"])
    </form>
@endsection