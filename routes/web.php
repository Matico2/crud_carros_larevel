<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// Adicione as rotas para registro e recuperação de senha




Route::get('/carros', [CarroController::class, 'index'])->middleware('auth.basic');
Route::get('/carros/novo', [CarroController::class, 'create'])->middleware('auth.basic');
Route::post('/carros/novo', [CarroController::class, 'store'])->middleware('auth.basic');

Route::get('/carros/delete/{id}', [CarroController::class, 'destroy'])->middleware('auth.basic');
Route::get('/carros/editar/{id}', [CarroController::class, 'edit'])->middleware('auth.basic');
Route::put('/carros/editar/{id}', [CarroController::class, 'update'])->middleware('auth.basic');


Route::get('/marcas', [MarcaController::class, 'index']);
Route::get('/marcas/novo', [MarcaController::class, 'create']);
Route::post('/marcas/novo', [MarcaController::class, 'store']);

Route::get('/marcas/delete/{id}', [MarcaController::class, 'destroy'])->middleware('auth.basic');
Route::get('/marcas/editar/{id}', [MarcaController::class, 'edit'])->middleware('auth.basic');
Route::put('/marcas/editar/{id}', [MarcaController::class, 'update'])->middleware('auth.basic');

?>