<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'siswa_id',
        'industri_id',
        'guru_id',
    ];
}
