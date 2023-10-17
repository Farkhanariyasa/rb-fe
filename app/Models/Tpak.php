<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tpak extends Model
{
    use HasFactory;
    protected $table = 'tpakmap';
    // timestamp
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tahun',
        'kabupaten',
        'tpak',
        'tpt',
    ];
}
