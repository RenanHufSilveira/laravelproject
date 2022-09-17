@extends('layouts.main')

@section('title', 'Products')

@section('content')
<h1>Product View</h1>
<a href="/">Voltar Home</a>

<div>
    <h2>Usando For</h2>
    @for($i = 0; $i < count($products); $i++)
        <p>{{$products[$i]}}</p>
    @endfor
</div>

<div>
    <h2>Usando Foreach</h2>
    @foreach($products as $product)
        {{--Variavel loop só é disponivel dentro no foreach--}}
        <p>{{$loop->index}} -> {{$product}}</p>
    @endforeach
</div>

<div>
    {{--Comentario usando o blade--}}
    <h2>Usando PHP puro</h2>
    @php
        $name = 'Usando PHP puro e dando echo';
        echo $name
    @endphp
</div>

<div>
    @if($request !==null)
    <h2>Listando o produto {{$request}}</h2>
    @else
    <h2>Nenhum produto foi encontrado</h2>
    @endif
</div>

@endsection

