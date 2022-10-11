@extends('layouts.main')

@section('title', 'Cadastrar')

@section('content')
<div class="class-12">
    <h3>Cadastro de categorias</h3>
    <div class="col-6 offset-md-3">
        <form action="/categories" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome da categoria">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea row="3" class="form-control" id="description" name="description" placeholder="Descrição da categoria"></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-primary col-2" value="Salvar">
            </div>
        </form>
    </div>
</div>
@endsection