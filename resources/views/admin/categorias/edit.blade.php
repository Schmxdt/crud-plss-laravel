@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>Editar Categoria</h1>
@endsection

@section('content')
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $categoria->nome }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Atualizar Categoria</button>
    </form>
@endsection
