<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    use HasFactory;
    protected $table = 'harga';
    // id	fungsi	indikator	time_lag	tahun	variabel	satuan	produksi_padi 	luas_panen_padi
    protected $fillable = [
        'id',
        'tahun',
        'produksi_padi',
        'luas_panen_padi'
    ];
}
