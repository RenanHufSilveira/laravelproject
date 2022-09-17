@extends('layouts.main')

@section('title', 'Listar')

@section('content')

<div class="row">
    <div id='search-container' class="col-md-12">
        <form class="d-flex" role="search" action="">
            <input class="form-control" type="search" placeholder="Produrar" aria-label="Search">
        </form>
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
                            <input class="form-check-input" type="checkbox" value="{{$product->id}}" id="flexCheckDefault">
                        </div>
                    </th>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category}}</td>
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
    </div>
</div>
@endsection