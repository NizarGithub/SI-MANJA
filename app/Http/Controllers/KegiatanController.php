<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

        return view('kegiatan.create');
    }

    public function store(){

        $input = request()->all();

        $input['created_by'] = auth()->user()->getAuthIdentifier();
        $input['status'] = Kegiatan::STATUS_BELUM_DIKERJAKAN;
        $input['kecamatan_code'] = auth()->user()->kecamatan->code;


        Kegiatan::create($input);

        return redirect('/')->with('status_success', 'Kegiatan berhasil ditambahkan');
    }

    public function byKecamatan($kecamatanCode){

        return view('kegiatan.list_kegiatan')->with('kegiatans', Kegiatan::where('kecamatan_code','=', $kecamatanCode)->get());

    }

    public function detail($id){
        return view('kegiatan.detail')->with('kegiatan', Kegiatan::find($id));
    }
}
