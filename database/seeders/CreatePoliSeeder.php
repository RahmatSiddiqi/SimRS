<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Seeder;

class CreatePoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poli = [
            [
                'id_poli' => '01',
                'nm_poli' => 'poli anak',
            ],
            [
                'id_poli' => '02',
                'nm_poli' => 'poli lansia',
            ],
            [
                'id_poli' => '03',
                'nm_poli' => 'poli mata',
            ],
            [
                'id_poli' => '04',
                'nm_poli' => 'poli umum',
            ],
            [
                'id_poli' => '05',
                'nm_poli' => 'poli kulit',
            ],


        ];
        foreach ($poli as $key => $value) {
            Poli::create($value);
        }
    }
}
