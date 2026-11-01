<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staf;
use Illuminate\Http\Request;

class StafController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data'   => Staf::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required|string|max:255',
            'alamat'        => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir'  => 'required|string|max:255',
            'no_hp'         => 'required|string|max:20',
        ]);

        $staf = Staf::create($validated);

        return response()->json([
            'message' => 'Data Staf Apotek Berhasil Disimpan',
            'data'    => $staf
        ], 201);
    }

    public function show($id)
    {
        $staf = Staf::findOrFail($id);
        return response()->json(['status' => 'success', 'data' => $staf], 200);
    }

    public function update(Request $request, $id)
    {
        $staf = Staf::findOrFail($id);
        $validated = $request->validate([
            'nama'          => 'sometimes|required|string|max:255',
            'alamat'        => 'sometimes|required|string',
            'tanggal_lahir' => 'sometimes|required|date',
            'tempat_lahir'  => 'sometimes|required|string|max:255',
            'no_hp'         => 'sometimes|required|string|max:20',
        ]);

        $staf->update($validated);
        return response()->json(['message' => 'Data Staf Berhasil Diperbarui', 'data' => $staf], 200);
    }

    public function destroy($id)
    {
        $staf = Staf::findOrFail($id);
        $staf->delete();
        return response()->json(['message' => 'Data Staf Berhasil Dihapus'], 200);
    }
}