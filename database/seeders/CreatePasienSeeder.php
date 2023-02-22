<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;

class CreatePasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pasien = [
            [
                'no_rm' => '123',
                'nama_pasien' => 'rahmat',
                'NIK' => '11080224045678',
            ],
            [
                'no_rm' => '1234',
                'nama_pasien' => 'abrar',
                'NIK' => '11080224045674',
            ],
            [
                'no_rm' => '12345',
                'nama_pasien' => 'kelvin',
                'NIK' => '11080224045675',
            ],
            [
                'no_rm' => '1235',
                'nama_pasien' => 'adi',
                'NIK' => '11080224045673',
            ],
            [
                'no_rm' => '12354',
                'nama_pasien' => 'acil',
                'NIK' => '11080224045612',
            ],
            [
                'no_rm' => '1231',
                'nama_pasien' => 'amat',
                'NIK' => '1108022404562',
            ],
            [
                'no_rm' => '12555',
                'nama_pasien' => 'atlin',
                'NIK' => '11080224045634',
            ],
            [
                'no_rm' => '12344',
                'nama_pasien' => 'ciluna',
                'NIK' => '11080224047643',
            ],
            [
                'no_rm' => '123422',
                'nama_pasien' => 'anti',
                'NIK' => '11080224045612',
            ],

        ];
        foreach ($pasien as $key => $value) {
            Pasien::create($value);
        }
    }
}
