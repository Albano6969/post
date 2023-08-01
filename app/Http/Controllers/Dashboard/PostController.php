<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\PutRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : view
    {
        $post=Post::paginate(2);
        return view('dashboard.post.index' ,compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : view
    {
        $categories=Category::pluck('id', 'title');
        $post=new Post();
       
        return view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) : RedirectResponse
    {
        /* dd($request->all()); */
        /* $data= $request->validated();
        $data['slug']= str::slug($data['title']);
        dd($data); */
        /* dd($request->validated()); */
        Post::create($request->validated());
        return to_route("post.index")->with('status', "Registro Creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): view
    {
        
       
        return view('dashboard.post.show', compact( 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): view
    {
        
        $categories=Category::pluck('id', 'title');
       
        return view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post): RedirectResponse
    {

        $data= $request->validated();

        if(isset($data['image'])) {
            $data["image"] = $filename = time().".".$data["image"]->extension();
            $request->image->move(public_path("image"), $filename);
        }


        $post->update($data);
        /* $request->session()->flash('status', "Registro Actualizado"); */
        /* return redirect()->route("post.show"); */
        return to_route("post.index")->with('status', "Registro Actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return to_route("post.index")->with('status', "Registro Eliminado");
    }
}
