@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <p>Bem-vindo ao painel administrativo!</p>

    <!-- Exibindo o componente Livewire que contém as métricas -->
    @livewire('dashboard-metrics')
@endsection
