<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Staf;
use App\Models\Obat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function pelanggan()
    {
        $pelanggans = Pelanggan::all();
        return view('pelanggan', compact('pelanggans'));
    }

    public function staf()
    {
        $stafs = Staf::all();
        return view('staf', compact('stafs'));
    }

    public function obat()
    {
        $obats = Obat::all();
        return view('obat', compact('obats'));
    }
}