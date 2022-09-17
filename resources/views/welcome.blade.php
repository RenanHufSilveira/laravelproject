@extends('layouts.main')

@section('title', 'Welcome')

@section('content')
<h2>Meu nome é {{$nome}}</h2>
                
@if($idade >= 29)
    <h2>Mas agora eu tenho {{$idade}} anos e não sou mais {{$profissao}}</h2>
@elseif($idade == 28)
    <h2>Tenho {{$idade}} anos e sou {{$profissao}} na Softexpert
@else
    <h2>Tinha {{$idade}} anos e ainda não era {{$profissao}}</h2>
@endif
@endsection