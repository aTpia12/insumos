<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->all());

        alert()->success('Categoria creada correctamente');

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;

        $category->save();

        alert()->success('Categoria actualizada correctamente!');

        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        //
    }
}
