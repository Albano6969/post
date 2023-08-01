<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/* use App\Models\Post; */
use App\Models\Category;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\PutRequest;





class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : view
    {
        $categories=Category::paginate(2);
        return view('dashboard.category.index' ,compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : view
    {
        
        $category=new Category();
       
        return view('dashboard.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request) : RedirectResponse
    {
        
        Category::create($request->validated());
        return to_route("category.index")->with('status', "Categoria Creada");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category): view
    {
        
       
        return view('dashboard.category.show', compact( 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): view
    {
        
        
       
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Category $category): RedirectResponse
    {

        $category->update($request->validated());
       
        return to_route("category.index")->with('status', "Categoria Actualizada");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route("category.index")->with('status', "Categoria Eliminada");
    }
}
