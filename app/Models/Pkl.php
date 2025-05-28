<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Industri;
use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    protected $fillable = [
        'mulai',
        'selesai',
        'siswa_id',
        'industri_id',
        'guru_id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function industri()
    {
        return $this->belongsTo(Industri::class, 'industri_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

}
