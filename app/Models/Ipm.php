<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipm extends Model
{
    use HasFactory;
    protected $table = 'ipm';
    // id	fungsi	indikator	time_lag	tahun	variabel	satuan	IPM	RLS	AHS	RPJM_sekolah	AHH	pengeluaran_perkapita	garis_kemiskinan_tahun
    protected $fillable = [
        'id',
        'fungsi',
        'indikator',
        'time_lag',
        'tahun',
        'variabel',
        'satuan',
        'IPM',
        'RLS',
        'AHS',
        'RPJM_sekolah',
        'AHH',
        'pengeluaran_perkapita',
        'garis_kemiskinan_tahun'
    ];
}
