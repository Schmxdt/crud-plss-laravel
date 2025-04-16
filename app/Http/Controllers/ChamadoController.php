<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\Categoria;
use App\Models\Situacao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;

class ChamadoController extends Controller
{
    // Exibir a lista de chamados
    public function index()
    {
        $chamados = Chamado::with(['categoria', 'situacao'])->get();

        // Preparando os dados para o Grid View
        $dataProvider = new EloquentDataProvider(Chamado::with(['categoria', 'situacao']));

        return view('admin.chamados.index', compact('dataProvider'));
    }

    // Exibir o formulário de criação de chamado
    public function create()
    {
        $categorias = Categoria::all();
        $situacoes = Situacao::all();
        return view('admin/chamados.create', compact('categorias', 'situacoes'));
    }

    // Salvar um novo chamado
    public function store(Request $request)
    {
        // Validação dos dados (não validamos 'situacao_id' porque será atribuído automaticamente)
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required|string',
        ]);

        // Atribuindo automaticamente o valor para a situação "Novo"
        $situacaoNovo = Situacao::where('nome', 'Novo')->first(); // Usando first() para obter o primeiro item que corresponde
        if (!$situacaoNovo) {
            // Caso não encontre a situação "Novo", lançar uma exceção ou retornar erro
            return redirect()->route('chamados.index')->with('error', 'Situação "Novo" não encontrada.');
        }

        // Atribuindo o ID da situação "Novo"
        $validatedData['situacao_id'] = $situacaoNovo->id;

        // Preenchendo o campo 'prazo_solucao' automaticamente para 3 dias após a data atual
        $validatedData['prazo_solucao'] = Carbon::now()->addDays(3)->toDateString(); // Adiciona 3 dias à data atual

        // Preenchendo o campo 'created_at' automaticamente com a data atual
        $validatedData['created_at'] = Carbon::now(); // Define a data de criação como a data atual

        // Criando o chamado com os dados validados
        Chamado::create($validatedData);

        // Redireciona para a lista de chamados
        return redirect()->route('chamados.index')->with('message', 'Chamado criado com sucesso.');
    }

    // Exibir o formulário de edição de chamado
    public function edit($id)
    {
        $chamado = Chamado::findOrFail($id);
        $categorias = Categoria::all();
        $situacoes = Situacao::all(); // Adicionar situações
        return view('admin/chamados.edit', compact('chamado', 'categorias', 'situacoes'));
    }

    // Atualizar um chamado
    public function update(Request $request, $id)
    {
        // Verifica se a situação foi passada como nome (não como ID) e faz a conversão
        if ($request->has('situacao_id') && !is_numeric($request->situacao_id)) {
            $situacao = Situacao::where('nome', $request->situacao_id)->first();
            if ($situacao) {
                // Se a situação existe, atribuímos o ID à variável
                $request->merge(['situacao_id' => $situacao->id]);
            } else {
                return redirect()->back()->withErrors(['situacao_id' => 'Situação inválida.']);
            }
        }

        // Validação dos dados
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'descricao' => 'required|string',
            'situacao_id' => 'required|exists:situacoes,id', // Valida a situação
        ]);

        // Recupera o chamado para edição
        $chamado = Chamado::findOrFail($id);
 
        $situacaoResolvido = Situacao::where('nome', 'Resolvido')->first();

        if ($situacaoResolvido && $validatedData['situacao_id'] == $situacaoResolvido->id) {
            $validatedData['data_solucao'] = Carbon::now();
        }

        // Atualiza os dados do chamado
        $chamado->update($validatedData);

        // Redireciona para a página de listagem de chamados com uma mensagem de sucesso
        return redirect()->route('chamados.index')->with('message', 'Chamado atualizado com sucesso.');
    }

    // Excluir um chamado
    public function destroy($id)
    {
        $chamado = Chamado::findOrFail($id);
        $chamado->delete();

        return redirect()->route('chamados.index');
    }

    // Exibir percentual de chamados resolvidos dentro do prazo
    public function percentualDentroPrazo()
    {
        $totalChamados = Chamado::whereMonth('created_at', now()->month)->count();
        $resolvidosDentroPrazo = Chamado::whereMonth('created_at', now()->month)
            ->where('situacao_id', Situacao::where('nome', 'CONCLUÍDO')->first()->id)
            ->where('data_solucao', '<=', 'prazo_solucao')
            ->count();

        $percentual = $totalChamados ? ($resolvidosDentroPrazo / $totalChamados) * 100 : 0;

        return view('percentual', compact('percentual'));
    }
}
