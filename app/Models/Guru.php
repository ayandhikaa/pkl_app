<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nip',
        'nama',
        'alamat',
        'kontak',
        'email',
    ];
    public function pkls()
    {
        return $this->hasMany(Pkl::class);
    }
}
