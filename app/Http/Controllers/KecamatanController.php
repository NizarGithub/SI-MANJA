<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('kecamatan')->with('kecamatan', Kecamatan::all());
    }

    public function process(){

        $name = request('name');
        $code = request('code');

        $kec = Kecamatan::firstOrCreate(['code' => $code],['name' => '']);

        $kec->name = $name;
        $kec->save();

        return redirect('kecamatan')->with('status_success', 'Berhasil disimpan');
    }

    public function delete($code){

        $del = Kecamatan::where('code', $code)->delete();

        return redirect('kecamatan')->with('status_success',  'Berhasil dihapus');
    }



}
