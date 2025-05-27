<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'nama' => 'Muhammad Naqsyaban Effendi',
            'email' => 'naqsya@example.com',
            'kontak' => '08123456789',
            'nis' => '12345678',
            'alamat' => 'Jl. Contoh Alamat No. 123, Depok, Sleman, DIY',
            'gender' => 'Laki-laki',
            'foto' => 'https://img.freepik.com/premium-vector/default-avatar-profile-icon-social-media-user-image-gray-avatar-icon-blank-profile-silhouette-vector-illustration_561158-3396.jpg', 
            'status_pkl' => 0,
        ]);

        Siswa::create([
            'nama' => 'Mutiara Sekar Kinasih',
            'email' => 'mutiara@example.com',
            'kontak' => '08123456789',
            'nis' => '12345678',
            'alamat' => 'Jl. Contoh Alamat No. 123, Depok, Sleman, DIY',
            'gender' => 'Perempuan',
            'foto' => 'https://img.freepik.com/premium-vector/default-avatar-profile-icon-social-media-user-image-gray-avatar-icon-blank-profile-silhouette-vector-illustration_561158-3396.jpg', 
            'status_pkl' => 0,
        ]);

        Siswa::create([
            'nama' => 'Surya Andhika Putri',
            'email' => 'surya@example.com',
            'kontak' => '08123456789',
            'nis' => '12345678',
            'alamat' => 'Jl. Contoh Alamat No. 123, Depok, Sleman, DIY',
            'gender' => 'Perempuan',
            'foto' => 'https://img.freepik.com/premium-vector/default-avatar-profile-icon-social-media-user-image-gray-avatar-icon-blank-profile-silhouette-vector-illustration_561158-3396.jpg', 
            'status_pkl' => 0,
        ]);

        Siswa::create([
            'nama' => 'Muhammad Akbar Amanullah',
            'email' => 'akbar@example.com',
            'kontak' => '08123456789',
            'nis' => '12345678',
            'alamat' => 'Jl. Contoh Alamat No. 123, Depok, Sleman, DIY',
            'gender' => 'Laki-laki',
            'foto' => 'https://img.freepik.com/premium-vector/default-avatar-profile-icon-social-media-user-image-gray-avatar-icon-blank-profile-silhouette-vector-illustration_561158-3396.jpg', 
            'status_pkl' => 0,
        ]);
        
        Siswa::create([
            'nama' => 'Nabila Nur Azizah',
            'email' => 'nabila@example.com',
            'kontak' => '08123456789',
            'nis' => '12345678',
            'alamat' => 'Jl. Contoh Alamat No. 123, Depok, Sleman, DIY',
            'gender' => 'Perempuan',
            'foto' => 'https://img.freepik.com/premium-vector/default-avatar-profile-icon-social-media-user-image-gray-avatar-icon-blank-profile-silhouette-vector-illustration_561158-3396.jpg', 
            'status_pkl' => 0,
        ]);
    }
}
