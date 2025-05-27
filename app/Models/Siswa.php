<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nis',
        'nama',
        'gender',
        'kelas',
        'jurusan',
        'alamat',
        'kontak',
        'email',
    ];

    public function pkls()
    {
        return $this->hasMany(Pkl::class);
    }
}
