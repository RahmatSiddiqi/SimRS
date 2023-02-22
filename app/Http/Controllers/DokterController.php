<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\User;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class DokterController extends Controller
{
    public function index()
    {
        $data = DB::table('dokters')
            ->join('polis', 'polis.id_poli', '=', 'dokters.id_poli')
            ->get();
        $user = User::all();
        $poli = Poli::all();
        $dokter = Dokter::get();


        return view('dokter', ['data' => $data, 'poli' => $poli, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kd_dokter' => 'required',
            'nm_dokter' => 'required',
            'id_poli' => 'required',

        ]);

        $dokter = new Dokter();
        $dokter->kd_dokter = $request->input('kd_dokter');
        $dokter->nm_dokter = $request->input('nm_dokter');
        $dokter->id_poli = $request->input('id_poli');


        $dokter->save();

        return redirect('/dokter');
    }

    public function storeakun(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'kd_dokter' => 'required',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $user->password = $password;
        $user->kd_dokter = $request->input('kd_dokter');
        $user->save();
        return redirect('/dokter-lihatakun');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'kd_dokter' => 'required',
            'nm_dokter' => 'required',
            'id_poli' => 'required',
        ]);
        // dd($request);
        $dokter = Dokter::find($request['kd_dokter']);

        $dokter->nm_dokter = $request['nm_dokter'];
        $dokter->id_poli = $request['id_poli'];

        $dokter->save();
        return redirect('/dokter');
    }

    public function delete($kd_dokter)
    {
        $dokter = Dokter::find($kd_dokter);
        $dokter->delete();
        return redirect('/dokter');
    }

    public function akun()
    {
        $user = User::all();
        // dd($param_view);
        return view('dokterakun', ['user' => $user]);
    }
    public function deleteakun($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/dokter-lihatakun');
    }
}
