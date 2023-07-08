<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kost;
use Illuminate\Database\Seeder;

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

        \App\Models\User::factory()->create([
            'name' => 'Test Penghuni',
            'email' => 'penghuni@gmail.com',
            'password' => "$2a$12$3P4GjGthIWQ.rcEd4HgWfeblNNLsas/bY1v1gUldH.Jr81pltL2f6",
            'role' => "penghuni"
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test Pemilik',
            'email' => 'pemilik@gmail.com',
            'password' => "$2a$12$3P4GjGthIWQ.rcEd4HgWfeblNNLsas/bY1v1gUldH.Jr81pltL2f6",
            'role' => "pemilik"
        ]);

        \App\Models\Kost::factory()->create([
                'id' => 1,
                'created_at' => '2023-07-08 09:29:41',
                'updated_at' => '2023-07-08 09:29:41',
                'nama' => 'Kucing Galak',
                'id_user' => 2,
                'slug' => 'kucing-galak',
                'alamat' => 'Jl kenangan',
                'deskripsi' => 'ascsas sac asc',
                'foto' => '/images/kost/kucing-galak.jpg',
                'fasilitas' => 'AC,Kucing,Whiskas',
                'harga' => 100,
                'bank' => 'bca',
                'no_rekening' => "123456789",
                'jumlah_kamar' => 5,
        ]);

        \App\Models\Kost::factory()->create([
            'id' => 3,
            'created_at' => '2023-07-08 09:48:22',
            'updated_at' => '2023-07-08 10:19:58',
            'nama' => 'Kost Pak Haji',
            'id_user' => 2,
            'slug' => 'kost-pak-haji',
            'alamat' => 'Pedurungan, Semarang',
            'deskripsi' => 'kost e pak haji murah tenan pokoke',
            'foto' => '/images/kost/kost-pak-haji.png',
            'fasilitas' => 'AC,Air Panas,Televisi,Garasi,Spring Bed,Meja Kursi,Lemari,Parkir Luas,Kamar Mandi,Wastafel',
            'harga' => 500000,
            'bank' => 'bri',
            'no_rekening' => "987654321",
            'jumlah_kamar' => 7,
        ]);

    }
}
