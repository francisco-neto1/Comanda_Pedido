<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'valor', 'comanda_id'];

    public function comanda()
    {
        return $this->belongsTo(Comanda::class);
    }
}
