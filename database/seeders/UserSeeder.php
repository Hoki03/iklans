<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Hoki',
            'level'     => 'admin',
            'email'     => '672020025@student.uksw.edu',
            'password'  => bcrypt('672020025'),
        ]);

        User::create([
            'name'      => 'Tiara',
            'level'     => 'operator',
            'email'     => '672020242@student.uksw.edu',
            'password'  => bcrypt('672020242'),
        ]);
    }
}
