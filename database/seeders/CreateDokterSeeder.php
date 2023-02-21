<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Seeder;

class CreateDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dokter = [
            [
                'kd_dokter' => 'D001',
                'nm_dokter' => 'kelvin',
                'id_poli' => '01',
            ],
            [
                'kd_dokter' => 'D002',
                'nm_dokter' => 'atan',
                'id_poli' => '02',
            ],
            [
                'kd_dokter' => 'D003',
                'nm_dokter' => 'ani',
                'id_poli' => '03',
            ],
            [
                'kd_dokter' => 'D004',
                'nm_dokter' => 'andi',
                'id_poli' => '04',
            ],
            [
                'kd_dokter' => 'D005',
                'nm_dokter' => 'una',
                'id_poli' => '05',
            ],


        ];
        foreach ($dokter as $key => $value) {
            Dokter::create($value);
        }
    }
}
