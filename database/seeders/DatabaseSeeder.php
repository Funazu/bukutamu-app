<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BukuTamu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        BukuTamu::create([
            'nama' => "Lia",
            'waktu' => "Jumat, 26 Mei 2023",
            'asal' => "Kudus",
            'keterangan' => "Konsultasi WIFI",
            'kontak' => "08xxxxxx"
        ]);
    }
    
}
