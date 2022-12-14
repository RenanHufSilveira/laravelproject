<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() 
    {
        $search = request('search');

        if($search) {
            $categories = Category::where('name', 'like','%'.$search.'%')
            ->orWhere('id', 'like','%'.$search.'%')
            ->get();
            return view('categories.list', ['categories' => $categories, 'search' => $search]);
        }

        $categories = Category::all();
        return view('categories.list', ['categories' => $categories, 'search' => $search]);
    }

    public function create() 
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect('/categories/list')->with("msg", "Categoria criada com sucesso");
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', ['category' => $category]);
    }

    public function destroy (Request $request)
    {
        Category::destroy($request->selectedCategories);
        return redirect('/categories/list')->with("msg", "Categoria excluida com sucesso");
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $category = Category::findOrFail($request->id)->update($data);
        return redirect('/categories/list')->with("msg", "Categoria alterada com sucesso");
    }
}
