<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'nama_tamu', 'nik_ktp', 'alamat', 'no_hp', 'deskripsi', 'tujuan', 'foto', 'created_at', 'updated_at'
    ];
}
