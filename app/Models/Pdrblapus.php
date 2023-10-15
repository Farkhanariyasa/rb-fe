<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdrblapus extends Model
{
    use HasFactory;
    protected $table = 'datapdrblapus';
    public $timestamps = false;
    protected   $fillable = [
        'id',
        // tahun	kode_lapangan_usaha	lapangan_usaha	adhb_lapangan_usaha	adhk_lapangan usaha	distribusi_lapangan usaha	laju_adhk_lapangan_usaha
        'tahun',
        'kode_lapangan_usaha',
        'lapangan_usaha',
        'adhb_lapangan_usaha',
        'adhk_lapangan_usaha',
        'distribusi_lapangan_usaha',
        'laju_adhk_lapangan_usaha',
    ];
}
