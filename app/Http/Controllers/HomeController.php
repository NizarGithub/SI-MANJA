<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kegiatan;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        if(auth()->check()){
            if(auth()->user()->role == User::ROLE_OFFICER){

                return view('home_login_officer')->with('kegiatans', Kegiatan::where('kecamatan_code','=', auth()->user()->kecamatan->code)->get());

            }elseif(auth()->user()->role == User::ROLE_MANAGER){

                return view('home_login_manager')->with('kecamatans', Kecamatan::all());

            }
            echo auth()->user()->role;

        }else{
            return view('home_notlogin');
        }

    }
}
