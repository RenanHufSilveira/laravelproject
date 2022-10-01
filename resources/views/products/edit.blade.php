@extends('layouts.main')

@section('title', 'Editar')

@section('content')
<div class="col-12">
    <h3>Editando produto</h3>
    <div class="row">
        <div class="col-6">
            <form action="/products/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome do produto" value="{{$product->name}}">
                        <label for="quantity" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantidade do produto" value="{{$product->quantity}}">
                        <label for="validity" class="form-label">Validate</label>
                        <input type="date" class="form-control" id="validity" name="validity" placeholder="Validade do produto" value="{{$product->validity->format('Y-m-d')}}">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea row="3" class="form-control" id="description" name="description" placeholder="Descrição do produto">{{$product->description}}</textarea>
                        <label for="category" class="form-label">Categoria</label>
                        <select class="form-select" id="category" name="category_id" aria-label="Categoria do produto">
                            <option selected>Selecione uma categoria</option>
                            @foreach($categories as $category)
                            @if($product->category_id == $category->id)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                            @endforeach
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
        <div class="col-6">
            @if(!empty($product->image))
            <img src="/img/products/{{$product->image}}" class="col-10 imgShow" />
            @else
            <img src="/img/products/default.jpg" class="col-10 imgShow" />
            @endif
        </div>
    </div>
</div>
@endsection