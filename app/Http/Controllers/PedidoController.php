<?php

namespace App\Http\Controllers;

use App\Models\Comanda;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(Comanda $comanda)
{
    return view('pedidos.create', compact('comanda'));
}

public function store(Request $request, Comanda $comanda)
{
    $request->validate([
        'descricao' => 'required|max:255',
        'quantidade' => 'required|integer|min:1',
        'valor' => 'required',
    ]);

    $pedido = new Pedido($request->all());
    $comanda->pedidos()->save($pedido);
    return redirect()->route('comandas.show', $comanda);
}

public function edit(Comanda $comanda, Pedido $pedido)
{
    return view('pedidos.edit', compact('comanda', 'pedido'));
}

public function update(Request $request, Comanda $comanda, Pedido $pedido)
{
    $request->validate([
        'produto' => 'required|max:255',
        'quantidade' => 'required|integer|min:1',
    ]);

    $pedido->update($request->all());
    return redirect()->route('comandas.show', $comanda);
}

public function destroy(Comanda $comanda, Pedido $pedido)
{
    $pedido->delete();
    return redirect()->route('comandas.show', $comanda);
}
}
