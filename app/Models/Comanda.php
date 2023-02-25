<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;

    protected $fillable = ['nome_cliente', 'numero_mesa', 'status'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }
}