<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdrb extends Model
{
    use HasFactory;
    protected $table = 'pdrb';
    protected $fillable = [
        // tahun	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi
        'tahun',
        'pdrb_adhb',
        'pdrb_adhk',
        'pdrb_perkapita',
        'laju_pertumbuhan_ekonomi',
    ];
}
