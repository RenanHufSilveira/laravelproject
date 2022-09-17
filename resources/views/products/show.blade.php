@extends('layouts.main')

@section('title', 'Detalhes do Produto')

@section('content')
<div class="row col-md-12">
    <h3>Detalhes do Produto</h3>
</div>
<div class="row">
    <div class="col-md-6">
        <p>Identificador: {{$product->id}}</p>
        <p>Nome: {{$product->name}}</p>
        <p>Descrição: {{$product->description}}</p>
        <p>Categoria: {{$product->category}}</p>
    </div>
    <div class="col-md-6">
        @if(!empty($product->image))
            <img src="/img/products/{{$product->image}}" class="col-md-12"/>
        @else
            <img src="/img/products/default.jpg" class="col-md-12"/>
        @endif
    </div>
</div>
@endsection