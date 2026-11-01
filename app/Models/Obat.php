<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';
    protected $primaryKey = 'kode_obat';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_obat', 'nama_obat', 'stock_obat', 'tanggal_kadaluaarsa'];
}