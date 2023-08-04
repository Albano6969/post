@csrf
        <label for="title">Titulo</label>
        <input type="text" class="form-control" name="title" id="title" value="{{old("title", $post->title)}}">

        <label for="slug">Slug</label>
        <input type="text" class="form-control" name="slug" id="slug" value="{{old("slug", $post->slug)}}">

        <label>Categorias</label>
        <select class="form-control" name="category_id">
            <option value=""></option>
            @foreach ($categories as $title=>$id)
                <option {{old("category_id", $post->category_id) == $id ? "selected" : ""}} value="{{$id}}">{{$title}}</option>
            @endforeach
        </select>

        <label for="content">Contenido</label>
        <textarea class="form-control" name="content" id="content">{{old("content", $post->content)}}</textarea>

        <label for="description">Descripcion</label>
        <textarea class="form-control" name="description" id="description">{{old("description", $post->description)}}</textarea>

        <label>Publicado</label>
        <select class="form-control" name="posted">
            <option {{old("posted", $post->posted) == "yes" ? "selected" : ""}} value="yes">Si</option>
            <option {{old("posted", $post->posted) == "not" ? "selected" : ""}} value="not" >No</option>
        </select>
        @if(isset($task) && $task == "edit")
            <label for="">Imagen</label>
            <input type="file" name="image">
        @endif

    <button class="btn btn-success mt-3" type="submit">Enviar</button>