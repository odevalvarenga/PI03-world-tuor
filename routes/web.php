<?php

use Illuminate\Support\Facades\Route;

// Importação dos Controllers Públicos e de Cliente
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacoteController; // Controller Público (Visualização)
use App\Http\Controllers\ReservaController; // Controller de Reservas

// Importação dos Controllers de Admin (Usando Alias para não confundir nomes)
use App\Http\Controllers\Admin\PacoteController as AdminPacoteController;
use App\Http\Controllers\Admin\UsuarioController as AdminUsuarioController;

/*
|--------------------------------------------------------------------------
| Rotas Públicas (Abertas para todos)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Visualização de Pacotes (Cliente não precisa logar para ver)
Route::get('/pacotes', [PacoteController::class, 'index'])->name('pacotes.index');
Route::get('/pacotes/{id}', [PacoteController::class, 'show'])->name('pacotes.show');


/*
|--------------------------------------------------------------------------
| Rotas do Cliente (Requer Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard do Cliente
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Perfil do Usuário (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Sistema de Reservas
    Route::get('/minhas-reservas', [ReservaController::class, 'index'])->name('reservas.my.index');
    Route::post('/reservar/{pacote}', [ReservaController::class, 'store'])->name('reservas.store');
});


/*
|--------------------------------------------------------------------------
| Rotas Administrativas (Requer Login + Permissão de Admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin']) // Usa o alias 'admin' que registramos no bootstrap/app.php
    ->prefix('admin') // Adiciona /admin na URL (ex: site.com/admin/pacotes)
    ->name('admin.')  // Adiciona admin. no nome da rota (ex: admin.pacotes.index)
    ->group(function () {

        // Dashboard Admin (Opcional, redireciona ou cria uma view especifica)
        Route::get('/dashboard', function() {
            return view('dashboard'); // Por enquanto usa o mesmo dashboard, ou crie admin.dashboard
        })->name('dashboard');

        // CRUD de Pacotes (Admin)
        // O resource cria automaticamente: index, create, store, show, edit, update, destroy
        Route::resource('pacotes', AdminPacoteController::class);

        // Gestão de Usuários
        Route::get('usuarios', [AdminUsuarioController::class, 'index'])->name('usuarios.index');
        
        // Se quiser ver todas as reservas do sistema:
        // Route::get('reservas', [AdminReservaController::class, 'index'])->name('reservas.index');
});


/*
|--------------------------------------------------------------------------
| Rotas de Autenticação do Breeze (Login, Register, Password Reset)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';