<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kependudukan extends Model
{
    use HasFactory;
    protected $table = 'datapenduduk';
    // id	fungsi	indikator	time_lag	tahun	variabel	satuan	hierarki1	sensus_penduduk	penduduk 	penduduk_jenis_kelamin	persen_penduduk	sex_ratio	luas_wilayah	kepadatan_penduduk
    public $timestamps = false;
    protected $fillable = [
        'id',
        'fungsi',
        'tahun',
        'penduduk',
        'sex_ratio',
        'luas_wilayah',
        'kepadatan_penduduk',
        'laki',
        'perempuan',
        'persen_laki',
        'persen_perempuan',
    ];
}
