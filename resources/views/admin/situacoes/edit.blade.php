@extends('adminlte::page')

@section('title', 'Editar Situação')

@section('content_header')
    <h1>Editar Situação</h1>
@endsection

@section('content')
    <form action="{{ route('situacoes.update', $situacao->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $situacao->nome }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Atualizar Situação</button>
    </form>
@endsection
