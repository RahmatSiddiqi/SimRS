<?php

namespace Database\Seeders;

use App\Models\Registrasi_pasien;
use Illuminate\Database\Seeder;

class CreateRegistrasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registrasi = [
            [
                'no_rm' => '123',
                'no_registrasi' => '001',
                'no_rawat' => '2023/02/22/001',
                'id_poli_tujuan' => '01',
                'tgl_registrasi' => '2023-02-22',
            ],
            [
                'no_rm' => '1234',
                'no_registrasi' => '002',
                'no_rawat' => '2023/02/22/002',
                'id_poli_tujuan' => '02',
                'tgl_registrasi' => '2023-02-22',
            ],
            [
                'no_rm' => '12345',
                'no_registrasi' => '003',
                'no_rawat' => '2023/02/22/003',
                'id_poli_tujuan' => '03',
                'tgl_registrasi' => '2023-02-22',
            ],
            [
                'no_rm' => '1235',
                'no_registrasi' => '004',
                'no_rawat' => '2023/02/22/004',
                'id_poli_tujuan' => '04',
                'tgl_registrasi' => '2023-02-22',
            ],
            [
                'no_rm' => '12354',
                'no_registrasi' => '005',
                'no_rawat' => '2023/02/22/005',
                'id_poli_tujuan' => '05',
                'tgl_registrasi' => '2023-02-22',
            ],

        ];
        foreach ($registrasi as $key => $value) {
            Registrasi_pasien::create($value);
        }
    }
}
