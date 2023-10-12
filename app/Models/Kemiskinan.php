<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemiskinan extends Model
{
    use HasFactory;
    protected $table = 'kemiskinan';
    protected $fillable = [
        'id',
        'fungsi',
        'indikator',
        'time_lag',
        'tahun',
        'variabel',
        'satuan',
        'hierarki1',
        'hierarki2',
        'jumlah_miskin',
        'persentase_miskin',
        'p1',
        'p2',
    ];
}
