<?php

namespace Database\Seeders;

use App\Models\Periksa_pasien;
use Illuminate\Database\Seeder;

class CreatePeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periksa = [
            [
                'no_rawat' => '2023/02/22/001',
                'kd_dokter' => 'D001',
                'ket_diagnosa' => 'okay sehat',
            ],
            [
                'no_rawat' => '2023/02/22/002',
                'kd_dokter' => 'D002',
                'ket_diagnosa' => 'mata rabun faktor umur',
            ],
            [
                'no_rawat' => '2023/02/22/003',
                'kd_dokter' => 'D003',
                'ket_diagnosa' => 'mata minus',
            ],
            [
                'no_rawat' => '2023/02/22/004',
                'kd_dokter' => 'D004',
                'ket_diagnosa' => 'demam flu',
            ],
            [
                'no_rawat' => '2023/02/22/005',
                'kd_dokter' => 'D005',
                'ket_diagnosa' => 'kurang vit D',
            ],

        ];
        foreach ($periksa as $key => $value) {
            Periksa_pasien::create($value);
        }
    }
}
