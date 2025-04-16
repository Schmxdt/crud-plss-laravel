<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Chamado;
use App\Models\Categoria;
use App\Models\Situacao;

class ChamadosDataGrid extends Component
{
    use WithPagination;

    public $search = '';
    public $categoryFilter = '';
    public $statusFilter = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $selectedRow = null;
    public $editMode = false;
    public $editData = [];
    public $categorias = [];
    public $situacoes = [];

    public function render()
    {
        $chamados = Chamado::query()
            ->when($this->search, function ($query) {
                $query->where('titulo', 'like', '%' . $this->search . '%')
                    ->orWhere('descricao', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.chamados-data-grid', compact('chamados'));
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function resetFilters()
    {
        $this->categoryFilter = '';
        $this->statusFilter = '';
        $this->search = '';
        $this->resetPage();
    }

    public function selectRow($id)
    {
        $this->selectedRow = $this->selectedRow === $id ? null : $id;
    }

    public function edit($id)
    {
        return redirect()->route('chamados.edit', $id);
    }

    public function saveEdit()
    {
        $this->validate([
            'editData.titulo' => 'required|string|max:255',
            'editData.descricao' => 'required|string',
            'editData.categoria_id' => 'required|exists:categorias,id',
            'editData.situacao_id' => 'required|exists:situacoes,id',
        ]);

        // Atualiza o chamado
        $chamado = Chamado::find($this->editData['id']);
        $chamado->fill($this->editData);
        $chamado->save();

        // Mensagem de sucesso
        session()->flash('message', 'Chamado atualizado com sucesso.');

        // Desativa o modo de edição e limpa os dados
        $this->editMode = false;
        $this->editData = [];
    }

    public function cancelEdit()
    {
        $this->editMode = false;
        $this->editData = [];
    }

    public function deleteRow($id)
    {
        $chamado = Chamado::find($id);
        if ($chamado) {
            $chamado->delete();
            session()->flash('message', 'Chamado excluído com sucesso.');
            $this->resetPage();
        }
    }
}
