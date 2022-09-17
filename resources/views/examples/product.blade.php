@extends('layouts.main')

@section('title', 'Product')

@section('content')
@if($id !==null)
<h2>Listando o produto {{$id}}</h2>
@else
<h2>Nenhum produto foi encontrado</h2>
@endif
@endsection