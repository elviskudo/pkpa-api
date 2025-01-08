<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    public function run()
    {
        // UUID universitas Indonesia
        $universityId = '0eb1bb46-19db-484f-880a-f77876ddb11a'; // Ganti dengan UUID yang sesuai

        DB::table('students')->insert([
            'uuid' => (string) Str::uuid(),
            'university_id' => $universityId,
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '081234567890',
            'birth_place' => 'Jakarta',
            'birth_date' => '2000-01-01',
            'address' => 'Jl. Contoh No. 1, Jakarta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
