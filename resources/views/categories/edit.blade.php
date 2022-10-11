@extends('layouts.main')

@section('title', 'Editar')

@section('content')
<div class="col-12">
    <h3>Editando categoria</h3>
    <div class="row">
        <div class="col-6">
            <form action="/categories/update/{{$category->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                <div class="form-group">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome da categoria" value="{{$category->name}}">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea row="3" class="form-control" id="description" name="description" placeholder="Descrição da categoria">{{$category->description}}</textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" class="btn btn-primary col-2" value="Salvar">
            </div>
            </form>
        </div>
    </div>
</div>
@endsection