<?php

namespace Database\Seeders;

use App\Models\Industri;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Industri::create([
            'nama' => 'CV Karya Hidup Sentosa',
            'alamat' => '144 Jalan Magelang. Yogyakarta, Yogyakarta 55242',
            'kontak' => '0274512095',
            'email' => 'operator1@quick.co.id',
            'website' => 'https://www.quick.co.id',
            'foto' => 'cv_karya_hidup_sentosa.jpg',
            'bidang_usaha' => 'Produksi alat-alat pertanian',
        ]);

        Industri::create([
            'nama' => 'PT Gamatechno Indonesia',
            'alamat' => 'Jl. Purwomartani, Sleman, Daerah Istimewa Yogyakarta 55571',
            'kontak' => '02745044044',
            'email' => ' info@gamatechno.com',
            'website' => 'https://www.gamatechno.com',
            'foto' => 'pt_gamatechno_indonesia.jpg',
            'bidang_usaha' => 'Pengembangan teknologi informasi',
        ]);

        Industri::create([
            'nama' => 'PT Cargloss Indonesia',
            'alamat' => 'Jl. RC Veteran No. 162 RT 001 RW 01 Bintaro Pesanggrahan Jakarta Selatan',
            'kontak' => '0217381199',
            'email' => 'info@cargloss.co.id',
            'website' => 'https://cargloss.co.id/',
            'foto' => 'pt_cargloss_indonesia.jpg',
            'bidang_usaha' => 'Produksi cat dan pelapis',
        ]);
    }
}
