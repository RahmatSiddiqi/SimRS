<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PasienController extends Controller
{
    //
    public function index()
    {

        $pasien = Pasien::get();
        return view('pasien', ['pasien' => $pasien]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_rm' => 'required',
            'nama_pasien' => 'required',
            'NIK' => 'required',
        ]);

        $pasien = new Pasien();
        $pasien->no_rm = $request->input('no_rm');
        $pasien->nama_pasien = $request->input('nama_pasien');
        $pasien->NIK = $request->input('NIK');

        $pasien->save();
        return redirect('/pasien');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'no_rm' => 'required',
            'nama_pasien' => 'required',
            'NIK' => 'required',
        ]);

        $pasien = Pasien::find($request['no_rm']);
        // $pasien = Pasien::where('no_rm', $request['no_rm']);
        $pasien->no_rm = $request['no_rm'];
        $pasien->nama_pasien = $request['nama_pasien'];
        $pasien->NIK = $request['NIK'];

        $pasien->save();
        return redirect('/pasien');
    }

    public function delete($no_rm)
    {
        $pasien = Pasien::find($no_rm);
        $pasien->delete();
        return redirect('/pasien');
    }
}
