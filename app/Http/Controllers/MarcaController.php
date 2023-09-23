<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
   // MarcaController.php

public function index()
{
    $marcas = Marca::all();
    return view('marcas.index', compact('marcas'));
}

public function create()
{
    return view('marcas.create');
}

public function store(Request $request)
{
    Marca::create($request->all());
    return redirect()->route('marcas.index');
}

public function edit(Marca $marca)
{
    return view('marcas.edit', compact('marca'));
}

public function update(Request $request, Marca $marca)
{
    $marca->update($request->all());
    return redirect()->route('marcas.index');
}

public function destroy(Marca $marca)
{
    $marca->delete();
    return redirect()->route('marcas.index');
}

}
