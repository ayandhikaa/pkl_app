<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'jurusan',
        'alamat',
        'kontak',
        'email',
    ];

    public function pkl()
    {
        return $this->hasMany(Pkl::class);
    }
}
