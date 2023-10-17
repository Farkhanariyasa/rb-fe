<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ihk extends Model
{
    use HasFactory;
    protected $table = 'dataihk';
    // timestamp
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tahun',
        'januari',
        'februari',
        'maret',
        'april',
        'mei',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'november',
        'desember',
    ];
}
