<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BangunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            $kategori = ['Cat', 'Paku', 'Semen'];
            $kategori_rand = array_rand($kategori, 1);

            $id = DB::table('bangunan')->insertGetId(
                [
                    'nama_toko' => $faker->word(),
                    'pegawai' => $faker->word(),
                    'jenis_barang' => $kategori[$kategori_rand],
                    'jumlah' => $faker->numberBetween(1, 100),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            );

            DB::table('bangunans')->where('kode_toko', $id);
                
                
        }
    }
};