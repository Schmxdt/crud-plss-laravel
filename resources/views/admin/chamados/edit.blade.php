@extends('adminlte::page')

@section('title', 'Editar Chamado')

@section('content_header')
    <h1>Editar Chamado</h1>
@endsection

@section('content')
    <form action="{{ route('chamados.update', $chamado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campo para Título -->
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $chamado->titulo) }}" required>
        </div>

        <!-- Campo para Categoria -->
        <div class="form-group">
            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $chamado->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo para Situação (fixo como "Novo" e não editável) -->
        <div class="form-group">
            <label for="situacao_id">Situação</label>
            <select name="situacao_id" class="form-control" required>
            <option value="Pendente" {{ $chamado->situacao_id == 'Pendente' ? 'selected' : '' }}>Pendente</option>
            <option value="Resolvido" {{ $chamado->situacao_id == 'Resolvido' ? 'selected' : '' }}>Resolvido</option>
            </select>
        </div>

        <!-- Campo para Prazo de Solução (preenchido automaticamente) -->
        <div class="form-group">
            <label for="prazo_solucao">Prazo de Solução</label>
            <input type="date" name="prazo_solucao" class="form-control" 
            value="{{ old('prazo_solucao', $chamado->prazo_solucao ? $chamado->prazo_solucao : \Carbon\Carbon::now()->addDays(3)->toDateString()) }}" disabled>
        </div>

        <!-- Campo para Descrição -->
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" rows="4" required>{{ old('descricao', $chamado->descricao) }}</textarea>
        </div>

        <!-- Botão para Atualizar Chamado -->
        <button type="submit" class="btn btn-warning">Atualizar Chamado</button>
    </form>
@endsection
