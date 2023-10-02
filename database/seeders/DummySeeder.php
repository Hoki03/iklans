<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 500; $i++) {
            $a = random_int(1, 12);
            $b = random_int(1, 30);
            $c = $a . '/' . $b;
            if ($c == "2/29" || $c == "2/30") {
                # code...
            } else {
                Transaksi::create([
                    'nama'  =>  'Transaksi ke-' . $i,
                    'nominal' => random_int(10000, 10000000),
                    'keterangan' => '',
                    'tanggal' => random_int(2021, 2022) . '/' . $a . '/' . $b,
                    'jenis_id' => random_int(1, 2),
                ]);
            }
        }
    }
}
