<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Pasien;
use Illuminate\Http\Request;

use App\Models\Registrasi_pasien;
use Illuminate\Support\Facades\DB;

class RegistrasiController extends Controller
{
    //
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = DB::table('registrasi_pasiens')
            ->join('pasiens', 'pasiens.no_rm', '=', 'registrasi_pasiens.no_rm')
            ->join('polis', 'polis.id_poli', '=', 'registrasi_pasiens.id_poli_tujuan')
            ->where('nm_poli', 'LIKE', '%' . $keyword . '%')
            ->get();

        $pasien = Pasien::all();
        $poli = Poli::all();
        return view('registrasi', ['data' => $data, 'pasien' => $pasien, 'poli' => $poli]);
    }

    public function see()
    {
        $data = DB::table('registrasi_pasiens')
            ->join('pasiens', 'pasiens.no_rm', '=', 'registrasi_pasiens.no_rm')
            ->join('polis', 'polis.id_poli', '=', 'registrasi_pasiens.id_poli_tujuan')
            ->get();
        $pasien = Pasien::all();
        $poli = Poli::all();

        return view('registrasii', ['data' => $data, 'pasien' => $pasien, 'poli' => $poli,]);
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'no_rm' => 'required',
            'no_registrasi' => 'required',
            'no_rawat' => 'required',
            'id_poli_tujuan' => 'required',
            'tgl_registrasi' => 'required',
        ]);

        $registrasi = new Registrasi_pasien();
        $registrasi->no_rm = $request->input('no_rm');
        $registrasi->no_registrasi = $request->input('no_registrasi');
        $registrasi->no_rawat = $request->input('no_rawat');
        $registrasi->id_poli_tujuan = $request->input('id_poli_tujuan');
        $registrasi->tgl_registrasi = $request->input('tgl_registrasi');

        $registrasi->save();
        return redirect('/registrasi-pasien');
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'no_rm' => 'required',
            'no_registrasi' => 'required',
            'no_rawat' => 'required',
            'id_poli_tujuan' => 'required',
            'tgl_registrasi' => 'required',
        ]);

        $registrasi = Registrasi_pasien::find($request['no_rm']);
        // $pasien = Pasien::where('no_rm', $request['no_rm']);
        $registrasi->no_rm = $request['no_rm'];
        $registrasi->no_registrasi = $request['no_registrasi'];
        $registrasi->no_rawat = $request['no_rawat'];
        $registrasi->id_poli_tujuan = $request['id_poli_tujuan'];
        $registrasi->tgl_registrasi = $request['tgl_registrasi'];

        $registrasi->save();
        return redirect('/registrasi-pasiensee');
    }

    public function delete($no_rm)
    {
        $registrasi = Registrasi_pasien::find($no_rm);
        $registrasi->delete();
        return redirect('/registrasi-pasien');
    }

    // public function cari(Request $request)
    // {

    //     $data = DB::table('registrasi_pasiens')
    //         ->join('pasiens', 'pasiens.no_rm', '=', 'registrasi_pasiens.no_rm')
    //         ->join('polis', 'polis.id_poli', '=', 'registrasi_pasiens.id_poli_tujuan')
    //         ->get();

    //     $data->when($request->name, function ($query) use ($request) {
    //         return $query->where('nm_poli', 'like', '%' . $request->name . '%');
    //     });
    //     // // menangkap data pencarian
    //     // $cari = $request->cari;


    //     // $poli = DB::table('polis')
    //     //     ->where('nm_poli', 'like', "%" . $cari . "%")
    //     //     ->paginate();


    //     $poli = Poli::all();
    //     $pasien = Pasien::all();
    //     // // mengirim data  ke view index
    //     return view('registrasi', ['poli' => $poli, 'data' => $data, 'pasien' => $pasien]);
    // }
}
