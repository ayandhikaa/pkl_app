<?php

namespace App\Models;

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

    public function siswas()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function industris()
    {
        return $this->belongsTo(Industri::class);
    }

    public function gurus()
    {
        return $this->belongsTo(Guru::class);
    }

}
