<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pacote;
use Illuminate\Http\Request; // Usando Request padrão para evitar erro de classe não encontrada

class PacoteController extends Controller
{
    // O middleware já está configurado no routes/web.php, não precisa do __construct aqui

    // LISTAR PACOTES
    public function index()
    {
        $pacotes = Pacote::orderBy('id', 'desc')->paginate(15);
        return view('admin.pacotes.index', compact('pacotes'));
    }

    // FORMULÁRIO DE CADASTRO
    public function create()
    {
        return view('admin.pacotes.create');
    }

    // SALVAR NOVO PACOTE
    public function store(Request $request)
    {
        // Validação simples aqui mesmo
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'continente' => 'required|string',
            'pais' => 'required|string',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        // Cria o pacote (Aqui futuramente entra a lógica das Imagens!)
        Pacote::create($dados);

        return redirect()
            ->route('admin.pacotes.index')
            ->with('success', 'Pacote criado com sucesso!');
    }

    // EXIBIR UM PACOTE
    public function show($id)
    {
        $pacote = Pacote::findOrFail($id);
        return view('admin.pacotes.show', compact('pacote'));
    }

    // FORMULÁRIO DE EDIÇÃO
    public function edit($id)
    {
        $pacote = Pacote::findOrFail($id);
        return view('admin.pacotes.edit', compact('pacote'));
    }

    // ATUALIZAR PACOTE
    public function update(Request $request, $id)
    {
        $pacote = Pacote::findOrFail($id);

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'continente' => 'required|string',
            'pais' => 'required|string',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        $pacote->update($dados);

        return redirect()
            ->route('admin.pacotes.index')
            ->with('success', 'Pacote atualizado com sucesso!');
    }

    // DELETAR PACOTE
    public function destroy($id)
    {
        $pacote = Pacote::findOrFail($id);
        $pacote->delete();

        return redirect()
            ->route('admin.pacotes.index')
            ->with('success', 'Pacote removido com sucesso!');
    }
}