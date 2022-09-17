<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $nome = 'Renan';
        $idade = 28;
        $profissao = 'Engenheiro de Software';
    
        return view('welcome',['nome' => $nome, 'idade' => $idade, 'profissao' => $profissao]);
    }

    public function exampleOrder()
    {
        return view('examples.order');
    }

    public function exampleFor($id)
    {
        return view('examples.product', ['id' => $id]);
    }

    public function exampleQuery()
    { 
        //Parametro não é obrigatorio quando colocamos ?
        //Url amigavel
        /*Route::get('/product/{id?}', function ($id = null) {
            return view('product', ['id' => $id]);
        });*/

        $products = ['Arroz', 'Feijão', 'Macarrão', 'Leite'];
        //Acessa request para pegar os parametros por query parameter
        $request = request('search', null);
    
        return view('examples.products', ['products' => $products, 'request' => $request]);
    }
}
