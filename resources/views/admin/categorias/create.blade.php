@extends('adminlte::page')

@section('title', 'Criar Categoria')

@section('content_header')
    <h1>Criar Categoria</h1>
@endsection

@section('content')
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Categoria</button>
    </form>
@endsection
