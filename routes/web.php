<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CurriculumController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('base.dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('usuario', UsuarioController::class);
    Route::resource('funcionario', FuncionarioController::class);
    Route::resource('produto', ProdutoController::class);
    Route::resource('curriculum', CurriculumController::class);

    Route::post('usuario/search', [UsuarioController::class, 'search'])->name('usuario.search');
    Route::post('funcionario/search', [FuncionarioController::class, 'search'])->name('funcionario.search');
    Route::post('produto/search', [ProdutoController::class, 'search'])->name('produto.search');
    Route::post('curriculum/search', [CurriculumController::class, 'search'])->name('curriculum.search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('admin');
});

require __DIR__ . '/auth.php';
