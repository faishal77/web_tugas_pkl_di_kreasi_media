<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarTamu extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'Alamat',
        'No_Hp',
    ];
}
