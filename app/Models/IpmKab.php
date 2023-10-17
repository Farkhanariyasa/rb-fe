<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpmKab extends Model
{
    use HasFactory;
    protected $table = 'ipmmap';
    public $timestamps = false;
    protected  $fillable = [
        "id",
        "tahun",
        "kabupaten",
        "ipm",
    ];
}
