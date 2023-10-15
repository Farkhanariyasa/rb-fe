<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemiskinan extends Model
{
    use HasFactory;
    protected $table = 'datakemiskinan';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tahun',
        'jumlah_miskin',
        'persentase_miskin',
        'p1',
        'p2',
    ];
}
