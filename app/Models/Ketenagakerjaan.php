<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketenagakerjaan extends Model
{
    use HasFactory;
    protected $table = 'datatenagakerja';
    public $timestamps = false;
    protected $fillable = [
        // id	tahun	usia_kerja	angkatan_kerja	bukan_angkatan_kerja	bekerja	pengangguran	sekolah	mengurus_rt	lainnya	tpak	tpt
        'tahun',
        'usia_kerja',
        'angkatan_kerja',
        'bukan_angkatan_kerja',
        'bekerja',
        'pengangguran',
        'sekolah',
        'mengurus_rt',
        'lainnya',
        'tpak',
        'tpt',
        'bukan_usia_kerja',
    ];
}
