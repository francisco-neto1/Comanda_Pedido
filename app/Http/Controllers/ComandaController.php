<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use Illuminate\Http\Request;

class ComandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $comandas = Comanda::all();
    return view('comandas.index', compact('comandas'));
}

public function create()
{
    return view('comandas.create');
}

public function store(Request $request)
{
    $request->validate([
        'nome_cliente' => 'required|max:255',
        'numero_mesa' => 'required|integer',
        'status' => 'required|boolean',
    ]);

    $comanda = Comanda::create($request->all());
    return redirect()->route('comandas.show', $comanda);
}

public function show(Comanda $comanda)
{
    return view('comandas.show', compact('comanda'));
}

public function edit(Comanda $comanda)
{
    return view('comandas.edit', compact('comanda'));
}

public function update(Request $request, Comanda $comanda)
{
    $request->validate([
        'nome_cliente' => 'required|max:255',
        'numero_mesa' => 'required|integer',
        'status' => 'required|boolean',
    ]);

    $comanda->update($request->all());
    return redirect()->route('comandas.show', $comanda);
}

public function destroy(Comanda $comanda)
{
    $comanda->delete();
    return redirect()->route('comandas.index');
}

}
