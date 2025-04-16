<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Total de Chamados</h3>
            </div>
            <div class="card-body">
                <p>{{ $totalChamados }} Chamados</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Chamados Abertos</h3>
            </div>
            <div class="card-body">
                <p>{{ $chamadosAbertos }} Chamados Abertos</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Chamados Concluídos</h3>
            </div>
            <div class="card-body">
                <p>{{ $chamadosConcluidos }} Chamados Concluídos</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Chamados do Mês Atual</h3>
            </div>
            <div class="card-body">
                <p>{{ $chamadosMesAtual }} Chamados neste mês</p>
            </div>
        </div>
    </div>
    
</div>
