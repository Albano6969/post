@extends('dashboard.layout')
@section('content')
    <h1>Todos las Categorias</h1>

    <a class="btn btn-success my-2" href="{{route('category.create')}}">Crear</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>
                    Titulo
                </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <td>
                    {{$item->title}}
                </td>
                
                <td>
                    <a class ="btn btn-primary my-2" href="{{route('category.edit', $item)}}">Editar</a>
                    <a class ="btn btn-primary my-2" href="{{route('category.show', $item)}}">Ver</a>
                    <form action="{{route('category.destroy',$item)}}" method="post">
                        @csrf
                        @method("DELETE")
                    <button class ="btn btn-danger my-2" type="submit">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <tfoot>
        {{$categories->links()}}
    </tfoot>
@endsection