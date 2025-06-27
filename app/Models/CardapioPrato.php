<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardapioPrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'cardapio_id',
        'prato_id',
    ];

    public function cardapio()
    {
        return $this->belongsTo(Cardapio::class);
    }

    public function prato()
    {
        return $this->belongsTo(Prato::class);
    }
}
