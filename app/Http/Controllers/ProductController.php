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

        /*
        Exemplo de join, não preciso fazer isso porque com o BelongTo ao fazer a consulta de
        produto as informações da categoria já vem com os registros
        $products = Product::select([
                        'products.*',
                        'categories.name AS categoryName'
                    ])
                    -> join('categories', 'categories.id', '=', 'products.category_id')
                    -> get();
        */

        $products = Product::all();
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
        return view('products.show', ['product' => $product]);
    }

    public function destroy (Request $request)
    {
        Product::destroy($request->selectedProducts);
        return redirect('/products/list')->with("msg", "Produto excluido com sucesso");
    }
}
