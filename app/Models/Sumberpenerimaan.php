<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumberpenerimaan extends Model
{
    use HasFactory;
    protected $table = 'datasumberpenerimaan';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tahun',
        'sumber_penerimaan',
        'penerimaan'
    ];
}
