<?php

namespace App\Http\Controllers;

use App\Models\Cardapio;
use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function index()
    {
        $cardapio = Cardapio::all();
        return response()->json($cardapio);
    }

    public function show($id)
    {
        $cardapio = Cardapio::find($id);
        if (!$cardapio) {
            return response()->json(['error' => 'Cardapio não encontrado'], 404);
        }
        return response()->json($cardapio);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'integer',
            'data_cardapio' => 'required|date',
            'tipo_cardapio' => 'required|integer'
        ]);

        $cardapio = Cardapio::create($validated);
        return response()->json($cardapio, 201);
    }

    public function update(Request $request, $id)
    {
        $cardapio = Cardapio::find($id);
        if (!$cardapio) {
            return response()->json(['error' => 'Cardapio não encontrado'], 404);
        }

        $validated = $request->validate([
            'codigo' => 'integer',
            'data_cardapio' => 'required|date',
            'tipo_cardapio' => 'required|integer'
        ]);

        $cardapio->update($validated);
        return response()->json($cardapio);
    }

    public function destroy($id)
    {
        $cardapio = Cardapio::find($id);
        if (!$cardapio) {
            return response()->json(['error' => 'Cardapio não encontrado'], 404);
        }

        $cardapio->delete();
        return response()->json(['message' => 'Cardapio deletado com sucesso']);
    }
}
