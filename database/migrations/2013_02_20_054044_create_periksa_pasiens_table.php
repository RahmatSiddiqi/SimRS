<?php

use App\Models\Dokter;
use App\Models\Registrasi_pasien;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriksaPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periksa_pasiens', function (Blueprint $table) {
            $table->string('no_rawat');
            $table->foreign('no_rawat')->references('no_rawat')->on('registrasi_pasiens');
            $table->string('kd_dokter');
            $table->foreign('kd_dokter')->references('kd_dokter')->on('dokters');
            $table->string('ket_diagnosa', 255)->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periksa_pasiens');
    }
}
