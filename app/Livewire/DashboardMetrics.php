<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Chamado;
use App\Models\Situacao;

class DashboardMetrics extends Component
{
    public $totalChamados;
    public $chamadosAbertos;
    public $chamadosConcluidos;
    public $chamadosMesAtual;

    public function mount()
    {
        $this->totalChamados = Chamado::count();
        $this->chamadosAbertos = Chamado::where('situacao_id', Situacao::where('nome', 'Novo')->first()->id)->count();
        $this->chamadosConcluidos = Chamado::where('situacao_id', Situacao::where('nome', 'Resolvido')->first()->id)->count();
        $this->chamadosMesAtual = Chamado::whereMonth('created_at', now()->month)->count();
    }

    public function render()
    {
        return view('livewire.dashboard-metrics');
    }
}
