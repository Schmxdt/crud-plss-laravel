@extends('adminlte::page')

@section('title', 'Situações')

@section('content_header')
    <h1>Situações</h1>
@endsection

@section('content')
    <a href="{{ route('situacoes.create') }}" class="btn btn-primary">Criar Nova Situação</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($situacoes as $situacao)
                <tr>
                    <td>{{ $situacao->nome }}</td>
                    <td>
                        <a href="{{ route('situacoes.edit', $situacao->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('situacoes.destroy', $situacao->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
