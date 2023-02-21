<?php

use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasiPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi_pasiens', function (Blueprint $table) {
            $table->double('no_rm');
            $table->foreign('no_rm')->references('no_rm')->on('pasiens');
            $table->string('no_registrasi', 3)->required();
            $table->string('no_rawat', 17)->unique()->required();
            $table->unsignedBigInteger('id_poli_tujuan');
            $table->foreign('id_poli_tujuan')->references('id_poli')->on('polis');
            $table->date('tgl_registrasi')->required();
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
        Schema::dropIfExists('registrasi_pasiens');
    }
}
