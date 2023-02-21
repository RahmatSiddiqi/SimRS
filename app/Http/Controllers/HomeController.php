<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = DB::table('periksa_pasiens')
            ->join('registrasi_pasiens', 'registrasi_pasiens.no_rawat', '=', 'periksa_pasiens.no_rawat')
            ->join('dokters', 'dokters.kd_dokter', '=', 'periksa_pasiens.kd_dokter')
            ->join('pasiens', 'pasiens.no_rm', '=', 'registrasi_pasiens.no_rm')
            ->join('polis', 'polis.id_poli', '=', 'registrasi_pasiens.id_poli_tujuan')
            ->get();
        // $data = $request->session()->all();
        $user = User::all();
        $doktercount = Dokter::count();
        $pasiencount = Pasien::count();
        $policount = Poli::count();
        return view('home', ['user' => $user, 'data' => $data, 'doktercount' => $doktercount, 'pasiencount' => $pasiencount, 'policount' => $policount]);
    }


    public function adminHome()
    {
        $data = DB::table('registrasi_pasiens')
            ->join('pasiens', 'pasiens.no_rm', '=', 'registrasi_pasiens.no_rm')
            ->join('polis', 'polis.id_poli', '=', 'registrasi_pasiens.id_poli_tujuan')
            ->get();

        $doktercount = Dokter::count();
        $pasiencount = Pasien::count();
        $policount = Poli::count();
        return view('adminHome', ['data' => $data, 'doktercount' => $doktercount, 'pasiencount' => $pasiencount, 'policount' => $policount]);
    }
}
