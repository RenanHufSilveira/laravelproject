<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::all();
        return view('products.list', ['products' => $products]);
    }

    public function create() 
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->enabled = 1;

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
        $ids = $request->selectedProducts;
        Product::destroy($ids);
        return redirect('/products/list')->with("msg", "Produto excluido com sucesso");
    }
}
