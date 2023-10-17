<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inflasi extends Model
{
    use HasFactory;
    protected $table = 'datainflasi';
    // timestamp
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tahun',
        'Inflasi_yogyakarta',
        'inflasi_nasional',
    ];
}
