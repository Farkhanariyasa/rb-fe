<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipm extends Model
{
    use HasFactory;
    protected $table = 'dataipm';
    public $timestamps = false;
    // id	fungsi	indikator	time_lag	tahun	variabel	satuan	IPM	RLS	AHS	RPJM_sekolah	AHH	pengeluaran_perkapita	garis_kemiskinan_tahun
    protected $fillable = [
        'tahun',
        'ipm',
        'rls',
        'ahs',
        'ahh',
        'pengeluaran_perkapita',
        'garis_kemiskinan_tahun',
    ];
}
