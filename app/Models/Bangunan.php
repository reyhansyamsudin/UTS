<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    use HasFactory;

    protected $table = 'bangunans';
    protected $primaryKey = 'kode_toko';

    protected $fillable = ['nama_toko', 'pegawai', 'jenis_barang', 'jumlah'];

}