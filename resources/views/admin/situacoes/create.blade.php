@extends('adminlte::page')

@section('title', 'Criar Situação')

@section('content_header')
    <h1>Criar Situação</h1>
@endsection

@section('content')
    <form action="{{ route('situacoes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar Situação</button>
    </form>
@endsection
