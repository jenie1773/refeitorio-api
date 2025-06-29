<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prato extends Model
{
    use HasFactory;

    protected $table = "prato";

    protected $fillable = [
        'codigo',
        'nome'
    ];

    public function cardapios()
    {
        return $this->belongsToMany(Cardapio::class, 'cardapio_prato');
    }
}
