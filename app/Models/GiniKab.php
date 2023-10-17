<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiniKab extends Model
{
    use HasFactory;
    protected $table = 'ginimap';
    public $timestamps = false;
    protected  $fillable = [
        "id",
        "tahun",
        "kabupaten",
        "gini",
    ];
}
