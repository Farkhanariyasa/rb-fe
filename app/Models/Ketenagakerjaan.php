<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketenagakerjaan extends Model
{
    use HasFactory;
    protected $table = 'ketenagakerjaan';
    protected $fillable = [
        // id	fungsi	indikator	time_lag	tahun	variabel	hierarki1	usia_kerja	angkatan_kerja	bukan_angkatan_kerja	persen_h1_usia_kerja	bekerja	pengangguran	sekolah	mengurus_rt	lainnya	persen_h2_usia_kerja	jml_tenaga_kerja	TPAK	TPT
        'id',
        'fungsi',
        'indikator',
        'time_lag',
        'tahun',
        'variabel',
        'hierarki1',
        'usia_kerja',
        'angkatan_kerja',
        'bukan_angkatan_kerja',
        'persen_h1_usia_kerja',
        'bekerja',
        'pengangguran',
        'sekolah',
        'mengurus_rt',
        'lainnya',
        'persen_h2_usia_kerja',
        'jml_tenaga_kerja',
        'TPAK',
        'TPT'
    ];
}
