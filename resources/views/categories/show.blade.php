@extends('layouts.main')

@section('title', 'Detalhes da Categoria')

@section('content')
<div class="row col-md-12">
    <h3>Detalhes da Categoria</h3>
</div>
<div class="row">
    <div class="col-md-6">
        <p>Identificador: {{$category->id}}</p>
        <p>Nome: {{$category->name}}</p>
        <p>Descrição: {{$category->description}}</p>
    </div>
</div>
@endsection