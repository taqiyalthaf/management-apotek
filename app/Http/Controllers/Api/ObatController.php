<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data'   => Obat::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_obat'          => 'required|string|unique:obats,kode_obat',
            'nama_obat'          => 'required|string|max:255',
            'stock_obat'         => 'required|integer',
            'tanggal_kadaluaarsa'=> 'required|date',
        ]);

        $obat = Obat::create($validated);

        return response()->json([
            'message' => 'Data Obat Berhasil Disimpan',
            'data'    => $obat
        ], 201);
    }

    public function show($kode_obat)
    {
        $obat = Obat::findOrFail($kode_obat);
        return response()->json(['status' => 'success', 'data' => $obat], 200);
    }

    public function update(Request $request, $kode_obat)
    {
        $obat = Obat::findOrFail($kode_obat);
        $validated = $request->validate([
            'nama_obat'          => 'sometimes|required|string|max:255',
            'stock_obat'         => 'sometimes|required|integer',
            'tanggal_kadaluaarsa'=> 'sometimes|required|date',
        ]);

        $obat->update($validated);
        return response()->json(['message' => 'Data Obat Berhasil Diperbarui', 'data' => $obat], 200);
    }

    public function destroy($kode_obat)
    {
        $obat = Obat::findOrFail($kode_obat);
        $obat->delete();
        return response()->json(['message' => 'Data Obat Berhasil Dihapus'], 200);
    }
}