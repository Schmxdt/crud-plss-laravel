<?php

namespace App\Http\Controllers;

use App\Models\Situacao;
use Illuminate\Http\Request;

class SituacaoController extends Controller
{
    // Exibir a lista de situações
    public function index()
    {
        $situacoes = Situacao::all(); // Recupera todas as situações do banco
        return view('admin/situacoes.index', compact('situacoes')); // Retorna a view com as situações
    }

    // Exibir o formulário de criação de situação
    public function create()
    {
        return view('admin/situacoes.create'); // Retorna o formulário de criação
    }

    // Salvar uma nova situação
    public function store(Request $request)
    {
        // Validar os dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255|unique:situacoes', // Garantir que o nome seja único
        ]);

        // Criar a nova situação
        Situacao::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('situacoes.index'); // Redireciona de volta para a lista de situações
    }

    // Exibir o formulário de edição de uma situação
    public function edit($id)
    {
        $situacao = Situacao::findOrFail($id); // Recupera a situação do banco
        return view('admin/situacoes.edit', compact('situacao')); // Retorna o formulário de edição
    }

    // Atualizar a situação no banco de dados
    public function update(Request $request, $id)
    {
        // Validar os dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255|unique:situacoes,nome,' . $id, // Garantir que o nome seja único, exceto para o próprio ID
        ]);

        $situacao = Situacao::findOrFail($id); // Recupera a situação existente
        $situacao->update([
            'nome' => $request->nome, // Atualiza o nome da situação
        ]);

        return redirect()->route('situacoes.index'); // Redireciona de volta para a lista de situações
    }

    // Excluir uma situação
    public function destroy($id)
    {
        $situacao = Situacao::findOrFail($id); // Recupera a situação do banco
        $situacao->delete(); // Exclui a situação

        return redirect()->route('situacoes.index'); // Redireciona de volta para a lista de situações
    }
}
