<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    //
    public function index()
    {
        $poli = Poli::get();
        return view('poli', ['poli' => $poli]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_poli' => 'required',
            'nm_poli' => 'required',
        ]);

        $poli = new Poli();
        $poli->id_poli = $request->input('id_poli');
        $poli->nm_poli = $request->input('nm_poli');


        $poli->save();
        return redirect('/poli');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id_poli' => 'required',
            'nm_poli' => 'required',
        ]);

        $poli = Poli::find($request['id_poli']);
        // $pasien = Pasien::where('no_rm', $request['no_rm']);
        $poli->id_poli = $request['id_poli'];
        $poli->nm_poli = $request['nm_poli'];


        $poli->save();
        return redirect('/poli');
    }

    public function delete($id_poli)
    {
        $poli = Poli::find($id_poli);
        $poli->delete();
        return redirect('/poli');
    }
}
