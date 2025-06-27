<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardapio extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'data_cardapio',
        'tipo_cardapio'
    ];

    public function pratos()
    {
        return $this->belongsToMany(Prato::class, 'cardapio_prato');
    }
}
