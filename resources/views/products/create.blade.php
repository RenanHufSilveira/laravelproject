@extends('layouts.main')

@section('title', 'Cadastrar')

@section('content')
<div class="class-12">
    <h3>Cadastro de produtos</h3>
    <div class="col-6 offset-md-3">
        <form action="/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome do produto">
                    <label for="quantity" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantidade do produto">
                    <label for="validity" class="form-label">Validate</label>
                    <input type="date" class="form-control" id="validity" name="validity" placeholder="Quantidade do produto">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea row="3" class="form-control" id="description" name="description" placeholder="Descrição do produto"></textarea>
                    <label for="category" class="form-label">Categoria</label>
                    <select class="form-select" id="category" name="category" aria-label="Categoria do produto">
                        <option selected>Selecione uma categoria</option>
                        <option value="Comida">Comida</option>
                        <option value="Bebida">Bebida</option>
                        <option value="Utilitários">Utilitários</option>
                    </select>
                    <div class="form-group">
                        <label for="image">Imagem</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-primary col-2" value="Salvar">
            </div>
        </form>
    </div>
</div>
@endsection