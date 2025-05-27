<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nama' => 'Muhammad Naqsyaban Effendi',
            'email' => 'naqsya@example.com',
            'kontak' => '08123456789',
            'nis' => '12345678',
            'alamat' => 'Jl. Contoh Alamat No. 123, Depok, Sleman, DIY',
            'gender' => 'Laki-laki',
            'foto' => 'https://img.freepik.com/premium-vector/default-avatar-profile-icon-social-media-user-image-gray-avatar-icon-blank-profile-silhouette-vector-illustration_561158-3396.jpg', 
            'status_pkl' => 0,
        ]);
    }
}
