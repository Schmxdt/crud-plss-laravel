<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Exibir a lista de categorias
    public function index()
    {
        $categorias = Categoria::all(); // Recupera todas as categorias do banco
        return view('admin/categorias.index', compact('categorias')); // Retorna a view com as categorias
    }

    // Exibir o formulário de criação de categoria
    public function create()
    {
        return view('admin/categorias.create'); // Retorna o formulário de criação
    }

    // Salvar uma nova categoria
    public function store(Request $request)
    {
        // Validar os dados recebidos
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias', // Garantir que o nome seja único
        ]);

        // Criar a nova categoria no banco
        Categoria::create([
            'nome' => $request->nome,
        ]);

        // Redirecionar para a lista de categorias
        return redirect()->route('categorias.index');
    }

    // Exibir o formulário de edição de uma categoria
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id); // Recupera a categoria do banco
        return view('admin/categorias.edit', compact('categoria')); // Retorna a view com a categoria
    }

    // Atualizar a categoria no banco
    public function update(Request $request, $id)
    {
        // Validar os dados recebidos
        $request->validate([
            'nome' => 'required|string|max:255|unique:categorias,nome,' . $id, // Garantir que o nome seja único, exceto para o próprio ID
        ]);

        // Recupera a categoria e atualiza os dados
        $categoria = Categoria::findOrFail($id);
        $categoria->update([
            'nome' => $request->nome,
        ]);

        // Redirecionar para a lista de categorias
        return redirect()->route('categorias.index');
    }

    // Excluir uma categoria
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id); // Recupera a categoria
        $categoria->delete(); // Exclui a categoria

        // Redirecionar para a lista de categorias
        return redirect()->route('categorias.index');
    }
}
