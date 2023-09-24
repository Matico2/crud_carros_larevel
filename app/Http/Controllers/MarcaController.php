<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
   // MarcaController.php
   public function index() {

    $marcas = DB::table('marcas')->orderBy('nome', 'asc')->get();
    $marcas = json_decode($marcas, true);
    return view('marcas.index', 
    ['marcas' => $marcas]); //select * from marcas
}

//função que irá retornar a tela do form
public function create() {
    return view("marcas.create");
}

public function store(Request $request) {
    //dd($request->all());

    $request->validate([
        'nome' => 'required|min:2|max:50',
    ]);
    
    Marca::create([
        'nome' => $request->nome,
    ]);
    return redirect('/marcas')->with('success', 'Marca salva com sucesso!');
}
public function edit($id)
{
    $marca = Marca::find($id);

    if (!$marca) {
        return redirect('/marcas')->with('error', 'Marca não encontrada');
    }

    return view('marcas.edit', compact('marca'));
}

public function update(Request $request, $id)
{
    $marca = Marca::find($id);

    if (!$marca) {
        return redirect('/marcas')->with('error', 'Marca não encontrada');
    }

    $request->validate([
        'nome' => 'required|min:2|max:50',
    ]);

    $marca->update([
        'nome' => $request->input('nome'),
    ]);

    return redirect('/marcas')->with('success', 'Marca atualizada com sucesso');
}

public function destroy($id)
{
    $marca = marca::find($id);

    // Check if the car with the given ID exists
    if (!$marca) {
        return redirect('/marcas')->with('error', 'Marca não encontrada');
    }

    // Use the delete method to delete the car
    $marca->delete();

    return redirect('/marcas')->with('success', 'Marca deletada com sucesso');
}

}


