<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketimpangan extends Model
{
    use HasFactory;
    protected $table = 'dataketimpangan';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tahun',
        'gini_ratio'
    ];
}
