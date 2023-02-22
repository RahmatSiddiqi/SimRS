<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Models\Periksa_pasien;
use App\Models\Registrasi_pasien;
use Illuminate\Support\Facades\DB;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $data = DB::table('periksa_pasiens')
            ->join('registrasi_pasiens', 'registrasi_pasiens.no_rawat', '=', 'periksa_pasiens.no_rawat')
            ->join('dokters', 'dokters.kd_dokter', '=', 'periksa_pasiens.kd_dokter')
            ->join('pasiens', 'pasiens.no_rm', '=', 'registrasi_pasiens.no_rm')
            ->join('polis', 'polis.id_poli', '=', 'registrasi_pasiens.id_poli_tujuan')
            ->whereRaw('registrasi_pasiens.id_poli_tujuan = dokters.id_poli')
            ->get();
        // dd($data);
        // $data = $request->session()->all();
        $user = User::all();
        $registrasi = Registrasi_pasien::all();
        $periksa_pasien = Periksa_pasien::get();

        return view('pemeriksaan', ['periksa_pasien' => $periksa_pasien, 'registrasi_pasien' => $registrasi, 'user' => $user, 'data' => $data]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_rawat' => 'required',
            'kd_dokter' => 'required',
            'ket_diagnosa' => 'required',
        ]);

        $pemeriksaan = new Periksa_pasien();
        $pemeriksaan->no_rawat = $request->input('no_rawat');
        $pemeriksaan->kd_dokter = $request->input('kd_dokter');
        $pemeriksaan->ket_diagnosa = $request->input('ket_diagnosa');


        $pemeriksaan->save();
        return redirect('/pemeriksaan-pasien');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'no_rawat' => 'required',
            'ket_diagnosa' => 'required',
        ]);

        $pemeriksaan = Periksa_pasien::find($request['no_rawat']);

        $pemeriksaan->no_rawat = $request['no_rawat'];
        $pemeriksaan->ket_diagnosa = $request['ket_diagnosa'];


        $pemeriksaan->save();
        return redirect('/pemeriksaan-pasien');
    }

    public function delete($no_rawat)
    {
        $pemeriksaan = Periksa_pasien::find($no_rawat);
        $pemeriksaan->delete();
        return redirect('/pemeriksaan-pasien');
    }

    public function adminPemeriksaan()
    {
        $data = DB::table('periksa_pasiens')
            ->join('registrasi_pasiens', 'registrasi_pasiens.no_rawat', '=', 'periksa_pasiens.no_rawat')
            ->join('dokters', 'dokters.kd_dokter', '=', 'periksa_pasiens.kd_dokter')
            ->join('pasiens', 'pasiens.no_rm', '=', 'registrasi_pasiens.no_rm')
            ->join('polis', 'polis.id_poli', '=', 'registrasi_pasiens.id_poli_tujuan')
            ->get();
        // $data = $request->session()->all();
        return view('adminPemeriksaan', ['data' => $data]);
    }
}
