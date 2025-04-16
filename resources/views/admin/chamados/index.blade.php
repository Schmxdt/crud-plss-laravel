@extends('adminlte::page')
@section('title', 'Chamados')

@section('content')
    @livewire('chamados-data-grid') 
@endsection
<head>
    @livewireStyles
</head>

<body>
    <!-- Seu conteúdo aqui -->
    @livewireScripts
</body>