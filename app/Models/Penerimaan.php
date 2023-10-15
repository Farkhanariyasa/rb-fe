<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;
    protected $table = 'datapenerimaan';
    public $timestamps = false;
    // id	fungsi	indikator	time_lag	tahun	variabel	satuan	hierarki1	penerimaan_daerah	penyusun_penerimaan_daerah
    protected $fillable = [
        'id',
        'tahun',
        'penerimaan_daerah',
    ];
}
