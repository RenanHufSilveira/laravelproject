@extends('layouts.main')

@section('title', 'Listar')

@section('content')
<?php
$existCategories = count($categories) > 0 ? true : false;
?>
<div>
    <div class="row">
        <div id='search-container' class="col-md-12">
            <form class="d-flex" role="search" action="/categories/list" method="GET">
                <input class="form-control" type="search" placeholder="Procurar" name="search" aria-label="Search">
            </form>
        </div>
    </div>

    <form action="/categories/delete" method="POST">
        @csrf
        <div class="row">
            <div id="command-container" class="col-md-12">
                @if($existCategories)
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
                            <th scope="col">Descrição</th>
                            <th scope="col">Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$category->id}}" name="selectedCategories[]">
                                </div>
                            </th>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <div class="row justify-content-center">
                                    <a href="/categories/{{$category->id}}" class="btn btn-dark col-5">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(!$existCategories && $search)
                    <h3>Nenhuma categoria foi encontrada. <a href="/categories/list">Ver todos</a></h3>
                @elseif(!$existCategories)
                    <h3>Nenhuma categoria foi cadastrada</h3>
                @endif
            </div>
    </form>
</div>
</div>
@endsection