<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data'   => Pelanggan::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp'  => 'required|string|max:20',
        ]);

        $pelanggan = Pelanggan::create($validated);

        return response()->json([
            'message' => 'Data Pelanggan Berhasil Disimpan',
            'data'    => $pelanggan
        ], 201);
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return response()->json(['status' => 'success', 'data' => $pelanggan], 200);
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $validated = $request->validate([
            'nama'   => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string',
            'no_hp'  => 'sometimes|required|string|max:20',
        ]);

        $pelanggan->update($validated);
        return response()->json(['message' => 'Data Pelanggan Berhasil Diperbarui', 'data' => $pelanggan], 200);
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return response()->json(['message' => 'Data Pelanggan Berhasil Dihapus'], 200);
    }
}