<?php

namespace App\Http\Controllers;

use App\Models\Prato;
use Illuminate\Http\Request;

class PratoController extends Controller
{
    public function index()
    {
        $prato = Prato::all();
        return response()->json($prato);
    }

    public function show($id)
    {
        $prato = Prato::find($id);
        if (!$prato) {
            return response()->json(['error' => 'Prato não encontrado'], 404);
        }
        return response()->json($prato);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'integer',
            'nome' => 'required|string|max:255'
        ]);

        $prato = Prato::create($validated);
        return response()->json($prato, 201);
    }

    public function update(Request $request, $id)
    {
        $prato = Prato::find($id);
        if (!$prato) {
            return response()->json(['error' => 'Prato não encontrado'], 404);
        }

        $validated = $request->validate([
            'codigo' => 'integer',
            'nome' => 'sometimes|string|max:255'
        ]);

        $prato->update($validated);
        return response()->json($prato);
    }

    public function destroy($id)
    {
        $prato = Prato::find($id);
        if (!$prato) {
            return response()->json(['error' => 'Prato não encontrado'], 404);
        }

        $prato->delete();
        return response()->json(['message' => 'Prato deletado com sucesso']);
    }
}
