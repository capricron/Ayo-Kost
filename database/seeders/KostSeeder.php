<?php

use Illuminate\Database\Seeder;
use App\Models\Kost;

class KostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
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
                'jumlah_kamar' => 5,
            ],
            [
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
                'jumlah_kamar' => 7,
            ],
        ];

        foreach ($data as $kostData) {
            Kost::create($kostData);
        }
    }
}
