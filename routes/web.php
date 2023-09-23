<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarrosController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('login');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/Carros', [CarrosController::class, 'index'])->middleware('auth.basic');
Route::get('/Carros/novo', [CarrosController::class, 'create'])->middleware('auth.basic');
Route::post('/Carros/novo', [CarrosController::class, 'store'])->middleware('auth.basic');

Route::get('/Carros/delete/{id}', [CarrosController::class, 'destroy'])->middleware('auth.basic');
Route::get('/Carros/editar/{id}', [CarrosController::class, 'edit'])->middleware('auth.basic');
Route::post('/Carros/editar/', [CarrosController::class, 'update'])->middleware('auth.basic');

Route::get('/marcas', [marcasController::class, 'index']);
Route::get('/marcas/novo', [marcasController::class, 'create']);
Route::post('/marcas/novo', [marcasController::class, 'store']);


?>