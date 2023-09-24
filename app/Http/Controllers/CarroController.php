<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\carro;
use Illuminate\Support\Facades\DB;

class CarroController extends Controller
{
    public function index() {

        $carros = DB::table('carros')->orderBy('modelo', 'asc')->get();
        $carros = json_decode($carros, true);
        return view('carros.index', 
        ['carros' => $carros]); //select * from carros
    }
    
    //função que irá retornar a tela do form
    public function create() {
        $marcas = DB::table('marcas')->orderBy('nome', 'asc')->get();
        return view("carros.create", ['marcas' => $marcas]);
    }
    

    public function store(Request $request) {
        // dd($request->all());
    
        $request->validate([
            'modelo' => 'required|min:2|max:50',
            'placa' => 'required|min:2|max:50',
            'marca_id' => 'required',
            'ano' => 'required|digits:4', 
        ]);
    
        Carro::create([
            'modelo' => $request->modelo,
            'marca_id' => $request->marca_id,
            'placa' => $request->placa,
            'ano' => $request->ano,
        ]);
        return redirect('/carros')->with('success', 'Carro salvo com sucesso!');
    }
    

    public function edit($id)
{
    $carro = Carro::find($id);

    if (!$carro) {
        return redirect('/carros')->with('error', 'Carro não encontrado');
    }

    $marcas = DB::table('marcas')->orderBy('nome', 'asc')->get();

    return view('carros.edit', compact('carro', 'marcas'));
}


public function update(Request $request, $id)
{
    $carro = Carro::find($id);

    if (!$carro) {
        return redirect('/carros')->with('error', 'Carro não encontrado');
    }

    $request->validate([
        'modelo' => 'required|min:2|max:50',
        'placa' => 'required|min:2|max:50',
        'marca_id' => 'required',
        'ano' => 'required|digits:4',
    ]);

    $carro->update([
        'modelo' => $request->input('modelo'),
        'marca_id' => $request->input('marca_id'),
        'placa' => $request->input('placa'),
        'ano' => $request->input('ano'),
    ]);

    return redirect('/carros')->with('success', 'Carro atualizado com sucesso');
}

public function destroy($id)
{
    $carro = Carro::find($id);

    // Check if the car with the given ID exists
    if (!$carro) {
        return redirect('/carros')->with('error', 'Carro não encontrado');
    }

    // Use the delete method to delete the car
    $carro->delete();

    return redirect('/carros')->with('success', 'Carro deletado com sucesso');
}

}