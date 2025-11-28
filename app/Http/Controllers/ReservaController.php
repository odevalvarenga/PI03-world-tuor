<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Pacote;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    // Lista apenas as reservas do usuário logado
    public function index()
    {
        $user = Auth::user();
        $reservas = Reserva::with('pacote')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('client.reservas.index', compact('reservas'));
    }

    // Criar reserva para um pacote (id simples)
    public function store(Request $request, Pacote $pacote)
    {
        $data = $request->validate([
            'data_reserva' => 'required|date',
            'qtd_pessoas' => 'required|integer|min:1',
        ]);

        $reserva = Reserva::create([
            'user_id' => Auth::id(),
            'pacote_id' => $pacote->id,
            'data_reserva' => $data['data_reserva'],
            'qtd_pessoas' => $data['qtd_pessoas'],
            'status' => 'pendente',
        ]);

        return redirect()->route('reservas.my.index')->with('success', 'Reserva criada com sucesso!');
    }
}
