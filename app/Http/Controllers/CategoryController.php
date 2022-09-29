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
        $ids = $request->selectedCategories;
        category::destroy($ids);
        return redirect('/categories/list')->with("msg", "Categoria excluida com sucesso");
    }
}
