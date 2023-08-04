@extends('dashboard.layout')
@section('content')
    <h1>Todos los registros</h1>

    <a class="btn btn-success my-2" href="{{route('post.create')}}">Crear</a>

    <table class="table mb-3">
        <thead>
            <tr>
                <th>
                    Titulo
                </th>
                <th>
                    Categorias
                </th>
                <th>
                    Posteado
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($post as $item)
            <tr>
                <td>
                    {{$item->title}}
                </td>
                <td>
                    {{$item->category->title}}
                </td>
                <td>
                    {{$item->posted}}
                </td>
                <td>
                    <a class="btn btn-primary my-2" href="{{route('post.edit', $item)}}">Editar</a>
                    <a class="btn btn-primary my-2" href="{{route('post.show', $item)}}">Ver</a>
                    <form action="{{route('post.destroy',$item)}}" method="post">
                        @csrf
                        @method("DELETE")
                    <button class="btn btn-danger my-2" type="submit">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <tfoot>
        {{$post->links()}}
    </tfoot>
@endsection