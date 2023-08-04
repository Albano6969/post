@csrf
        <label for="title">Titulo</label>
        <input class="form-control" type="text" name="title" id="title" value="{{old("title", $category->title)}}">

        <label for="slug">Slug</label>
        <input class="form-control" type="text" name="slug" id="slug" value="{{old("slug", $category->slug)}}">

        

    <button class="btn btn-success mt-3" type="submit">Enviar</button>