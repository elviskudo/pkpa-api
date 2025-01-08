<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UniversitySeeder extends Seeder
{
    public function run()
    {
        DB::table('universities')->insert([
            'uuid' => (string) Str::uuid(),
            'name' => 'Universitas Indonesia',
            'code' => 'UI',
            'description' => 'Universitas Indonesia adalah universitas tertua di Indonesia.',
            'slug' => 'universitas-indonesia',
            'image_url' => 'https://example.com/image.jpg', // Ganti dengan URL gambar yang sesuai
            'logo_url' => 'https://example.com/logo.png', // Ganti dengan URL logo yang sesuai
            'certificate_url' => null,
            'brochure_url' => null,
            'vision' => 'Menjadi universitas yang unggul dan berdaya saing global.',
            'mission' => 'Menyelenggarakan pendidikan, penelitian, dan pengabdian kepada masyarakat.',
            'goal' => 'Mencetak lulusan yang berkualitas dan berintegritas.',
            'candidate_agreement' => null,
            'core_pattern' => null,
            'is_active' => true,
            'order' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
