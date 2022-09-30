<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() 
    {
        $search = request('search');

        if($search) {
            $products = Product::where('name', 'like','%'.$search.'%')
            ->orWhere('id', 'like','%'.$search.'%')
            ->get();
            return view('products.list', ['products' => $products, 'search' => $search]);
        }

        $products = Product::select([
                        'products.*',
                        'categories.name AS categoryName'
                    ])
                    -> join('categories', 'categories.id', '=', 'products.category_id')
                    -> get();
        return view('products.list', ['products' => $products, 'search' => $search]);
    }

    public function create() 
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->enabled = 1;
        $product->validity = $request->validity;
        $product->category_id = $request->category;

        //Upload da imagem
        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")).".".$extension;
            $requestImage->move(public_path('img/products/'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect('/products/list')->with("msg", "Produto criado com sucesso");
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::findOrFail($product->category_id);
        return view('products.show', ['product' => $product, 'category' => $category]);
    }

    public function destroy (Request $request)
    {
        $ids = $request->selectedProducts;
        Product::destroy($ids);
        return redirect('/products/list')->with("msg", "Produto excluido com sucesso");
    }
}
