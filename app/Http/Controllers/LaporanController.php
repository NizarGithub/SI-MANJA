<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\Laporan;
use App\LaporanImages;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($kegiatanId){

        return view('laporan.create')->with('kegiatanId', $kegiatanId);

    }

    public function store($kegiatanId){

//        $caption = request('caption');

//        print_r(request('note'));exit;


//        foreach (request()->images as $key =>$photo) {
//            $filename = $photo->store('laporan_images');
//            LaporanImages::create([
//                'kegiatan_id' => $kegiatanId,
//                'url' => $filename,
//                'caption' => (isset($caption[$key])) ? $caption[$key] : ''
//            ]);
//        }

        $laporan = Laporan::create(['note' => request('note'), 'kegiatan_id'=> $kegiatanId]);
        $kegiatan = Kegiatan::find($kegiatanId)->update(['status' => Kegiatan::STATUS_SUDAH_DIKERJAKAN]);

        return redirect('kegiatan/'.$kegiatanId)->with('status_success',  'Berhasil disimpan');

    }

    public function received($kegiatanId){

        $kegiatan = Kegiatan::find($kegiatanId)->update(['is_received' => true]);

        return redirect('kegiatan/'.$kegiatanId)->with('status_success',  'Berhasil disimpan');

    }


}
