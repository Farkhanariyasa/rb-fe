<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdrbKab extends Model
{
    use HasFactory;
    protected $table = 'pdrbmap';
    public $timestamps = false;
    protected  $fillable = [
        "id",
        "tahun",
        "kabupaten",
        "pdrb",
    ];
}
