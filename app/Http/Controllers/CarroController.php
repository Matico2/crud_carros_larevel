<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Marca;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    // CarroController.php

public function index()
{
    $carros = Carro::all();
    return view('carros.index', compact('carros'));
}

public function create()
{
    $marcas = Marca::all();
    return view('carros.create', compact('marcas'));
}

public function store(Request $request)
{
    Carro::create($request->all());
    return redirect()->route('carros.index');
}

public function edit(Carro $carro)
{
    $marcas = Marca::all();
    return view('carros.edit', compact('carro', 'marcas'));
}

public function update(Request $request, Carro $carro)
{
    $carro->update($request->all());
    return redirect()->route('carros.index');
}

public function destroy(Carro $carro)
{
    $carro->delete();
    return redirect()->route('carros.index');
}

}
