<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'is_admin' => '1',
                'password' => bcrypt('12345678'),
                'kd_dokter' => null,
            ],
            [
                'name' => 'kelvin',
                'email' => 'kelvin@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('cobamasuk'),
                'kd_dokter' => 'D001',
            ],
            [
                'name' => 'atan',
                'email' => 'atan@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('12345678'),
                'kd_dokter' => 'D002',
            ],
            [
                'name' => 'ani',
                'email' => 'ani@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('12345678'),
                'kd_dokter' => 'D003',
            ],
            [
                'name' => 'andi',
                'email' => 'andi@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('12345678'),
                'kd_dokter' => 'D004',
            ],
            [
                'name' => 'una',
                'email' => 'una@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('12345678'),
                'kd_dokter' => 'D005',
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
