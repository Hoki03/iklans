<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaksi::Create([
            'nama'          => 'Hoki',
            'nominal'       => '1000000',
            'keterangan'    => 'Oke',
            'tanggal'       => '2023-08-23',
            'jenis_id'      => '1',
        ]);
    }
}
