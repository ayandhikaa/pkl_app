<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nis',
        'nama',
        'gender',
        'alamat',
        'kontak',
        'email',
        'status_pkl',
        'foto',
    ];

    public function pkl()
    {
        return $this->hasMany(Pkl::class);
    }
}
