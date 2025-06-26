<?php

namespace App\Http\Controllers;

use App\Models\Prato;
use Illuminate\Http\Request;

class CardapioPratoController extends Controller
{
    public function index()
    {
        $cardapioprato = CardapioPrato::all();
        return response()->json($cardapioprato);
    }

    public function show($id)
    {
        $cardapioprato = CardapioPrato::find($id);
        if (!$cardapioprato) {
            return response()->json(['error' => 'Prato não encontrado'], 404);
        }
        return response()->json($cardapioprato);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'integer',
            'nome' => 'required|string|max:255'
        ]);

        $cardapioprato = CardapioPrato::create($validated);
        return response()->json($cardapioprato, 201);
    }

    public function update(Request $request, $id)
    {
        $cardapioprato = CardapioPrato::find($id);
        if (!$cardapioprato) {
            return response()->json(['error' => 'Prato não encontrado'], 404);
        }

        $validated = $request->validate([
            'codigo' => 'integer',
            'nome' => 'sometimes|string|max:255'
        ]);

        $cardapioprato->update($validated);
        return response()->json($cardapioprato);
    }

    public function destroy($id)
    {
        $cardapioprato = CardapioPrato::find($id);
        if (!$cardapioprato) {
            return response()->json(['error' => 'Prato não encontrado'], 404);
        }

        $cardapioprato->delete();
        return response()->json(['message' => 'Prato deletado com sucesso']);
    }
}
