@extends('dashboard.layout')
@section('content')
    <h1>Todos las Categorias</h1>

    <a href="{{route('category.create')}}">Crear</a>

    <table>
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
                    <a href="{{route('category.edit', $item)}}">Editar</a>
                    <a href="{{route('category.show', $item)}}">Ver</a>
                    <form action="{{route('category.destroy',$item)}}" method="post">
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
        {{$categories->links()}}
    </tfoot>
@endsection