<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aktifitas_tamu extends Model
{
    use HasFactory;
    protected $fillable = 
    [   
        'name',
        'KegiatanTamu'
    ];
}
