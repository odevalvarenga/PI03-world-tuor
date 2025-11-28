<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // O middleware já está configurado no routes/web.php, não precisa do __construct aqui
    
    public function index(Request $request)
    {
        $query = User::query();

        // Pesquisa simples
        if ($q = $request->input('q')) {
            $query->where(function($w) use ($q) {
                $w->where('name', 'like', "%{$q}%")
                  ->orWhere('email', 'like', "%{$q}%");
            });
        }

        $users = $query->orderBy('id', 'desc')->paginate(15)->withQueryString();

        return view('admin.usuarios.index', compact('users', 'q'));
    }
}