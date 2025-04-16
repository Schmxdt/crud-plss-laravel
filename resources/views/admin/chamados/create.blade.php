@extends('adminlte::page')

@section('title', 'Criar Chamado')

@section('content_header')
    <h1>Criar Chamado</h1>
@endsection

@section('content')
    <form action="{{ route('chamados.store') }}" method="POST">
        @csrf

        <!-- Campo para Título -->
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <!-- Campo para Categoria -->
        <div class="form-group">
            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Campo para Situação (fixo como "Novo") -->
        <div class="form-group">
            <label for="situacao_id">Situação</label>
            <input type="text" value="Novo" class="form-control" disabled>
        </div>

        <!-- Campo para Descrição -->
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4" required></textarea>
        </div>

        <!-- Botão para Criar Chamado -->
        <button type="submit" class="btn btn-primary">Criar Chamado</button>
    </form>
@endsection
