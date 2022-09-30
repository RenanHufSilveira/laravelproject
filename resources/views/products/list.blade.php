@extends('layouts.main')

@section('title', 'Listar')

@section('content')
<?php
$existProducts = count($products) > 0 ? true : false;
?>
<div>
    <div class="row">
        <div id='search-container' class="col-md-12">
            <form class="d-flex" role="search" action="/products/list" method="GET">
                <input class="form-control" type="search" placeholder="Procurar" name="search" aria-label="Search">
            </form>
        </div>
    </div>

    <form action="/products/delete" method="POST">
        @csrf
        <div class="row">
            <div id="command-container" class="col-md-12">
                @if($existProducts)
                <button type="submit" class="btn btn-danger" name="delete">
                    <ion-icon name="eye-outline"></ion-icon>Deletar
                </button>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Código</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Ativo</th>
                            <th scope="col">Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$product->id}}" name="selectedProducts[]">
                                </div>
                            </th>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->categoryName}}</td>
                            @if($product->enabled == 1)
                            <td>Ativado</td>
                            @else
                            <td>Desativado</td>
                            @endif
                            <td>
                                <div class="row justify-content-center">
                                    <a href="/products/{{$product->id}}" class="btn btn-dark col-5">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(!$existProducts && $search)
                    <h3>Nenhum produto foi encontrado. <a href="/products/list">Ver todos</a></h3>
                @elseif(!$existProducts)
                    <h3>Nenhum produto foi cadastrado</h3>
                @endif
            </div>
    </form>
</div>
</div>
@endsection