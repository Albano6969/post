@extends('dashboard.layout')
@section('content')
    <h1>Todos los registros</h1>

    <a href="{{route('post.create')}}">Crear</a>

    <table>
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
                    <a href="{{route('post.edit', $item)}}">Editar</a>
                    <a href="{{route('post.show', $item)}}">Ver</a>
                    <form action="{{route('post.destroy',$item)}}" method="post">
                        @csrf
                        @method("DELETE")
                    <button type="submit">Eliminar</button>
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