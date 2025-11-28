<?php

namespace App\Http\Controllers; // <--- O Namespace TEM que ser esse

use Illuminate\Http\Request;
use App\Models\Pacote;

class PacoteController extends Controller // <--- O nome TEM que ser PacoteController
{
    // Método público para listar pacotes
    public function index()
    {
        $pacotes = Pacote::all();
        return view('pacotes.pacote', compact('pacotes'));
    }

    // Método público para ver detalhes
    public function show($id)
    {
        $pacote = Pacote::findOrFail($id);
        return view('pacote-detalhe', compact('pacote'));
    }
}