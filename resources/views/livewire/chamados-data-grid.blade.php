<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <h5>Chamados</h5>
            <a href="{{ route('chamados.create') }}" class="btn btn-primary">Novo Chamado</a>
            @if ($selectedRow)
                <button wire:click="edit({{ $selectedRow }})" class="btn btn-warning">Editar</button>

                <button wire:click="deleteRow({{ $selectedRow }})" class="btn btn-danger">Excluir</button>
            @endif
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th wire:click="sortBy('id')" style="cursor: pointer;">ID @if($sortField === 'id') <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span> @endif</th>
                <th wire:click="sortBy('titulo')" style="cursor: pointer;">Título @if($sortField === 'titulo') <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span> @endif</th>
                <th wire:click="sortBy('descricao')" style="cursor: pointer;">Descrição @if($sortField === 'descricao') <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span> @endif</th>
                <th wire:click="sortBy('categoria_id')" style="cursor: pointer;">Categoria @if($sortField === 'categoria_id') <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span> @endif</th>
                <th wire:click="sortBy('situacao_id')" style="cursor: pointer;">Situação @if($sortField === 'situacao_id') <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span> @endif</th>
                <th wire:click="sortBy('prazo_solucao')" style="cursor: pointer;">Prazo solução @if($sortField === 'prazo_solucao') <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span> @endif</th>
                <th wire:click="sortBy('data_solucao')" style="cursor: pointer;">Data solução @if($sortField === 'data_solucao') <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span> @endif</th>
                <th wire:click="sortBy('created_at')" style="cursor: pointer;">Criado em @if($sortField === 'created_at') <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span> @endif</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($chamados as $chamado)
                <tr wire:click="selectRow({{ $chamado->id }})" class="{{ $selectedRow === $chamado->id ? 'table-primary' : '' }}" style="cursor: pointer;">
                    <td>{{ $chamado->id }}</td>
                    <td>{{ $chamado->titulo }}</td>
                    <td>{{ $chamado->descricao }}</td>
                    <td>{{ $chamado->categoria->nome ?? 'N/A' }}</td>
                    <td>{{ $chamado->situacao->nome ?? 'N/A' }}</td>
                    <td>{{ $chamado->prazo_solucao ? \Carbon\Carbon::parse($chamado->prazo_solucao)->format('d/m/Y') : 'Sem data' }}</td>
                    <td>{{ $chamado->data_solucao ? \Carbon\Carbon::parse($chamado->data_solucao)->format('d/m/Y') : 'Sem data' }}</td>
                    <td>{{ $chamado->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhum chamado encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $chamados->links() }}
    </div>
</div>
