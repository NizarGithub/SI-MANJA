<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('user.form');
    }

    public function store(){

        if(auth()->user()->role != User::ROLE_MANAGER) redirect('/');

        $allInput = request()->all();
        $allInput['password'] = bcrypt('12345678');
//        $allInput['role']  = User::ROLE_OFFICER;

        User::create($allInput);

        return redirect('user')->with('status_success', 'Berhasil disimpan');

    }

    public function detail($id){

        if(auth()->user()->role != User::ROLE_MANAGER) redirect('/');

        return view('user.detail')->with('user',User::find($id));
    }

    public function edit($id){

        if(auth()->user()->role != User::ROLE_MANAGER) redirect('/');

        return view('user.form')->with('user',User::find($id));
    }

    public function update($id){

        if(auth()->user()->role != User::ROLE_MANAGER) redirect('/');

        $allInput = request()->all();

        $user = User::where('id','=', $id)->update($allInput);

        return redirect('user/detail/'.$id)->with('status_success', 'Berhasil disimpan');
    }

    public function delete($id){

        if(auth()->user()->role != User::ROLE_MANAGER) redirect('/');

        User::find($id)->delete();

        return redirect('user')->with('status_success', 'Berhasil dihapus');
    }

    public function changePassword(){

        return view('user.change_password');

    }

    public function changePasswordProcess(){

        if(request('new') != request('new_confirmation')){
            return redirect('change_password')->with('status_fail', 'Konfirmasi Password baru tidak sama');
        }

        if(!password_verify(request('old'), auth()->user()->getAuthPassword())){
            return redirect('change_password')->with('status_fail', 'Password lama salah');
        }

        $user = User::find(auth()->user()->id);
        $user->password = bcrypt(request('new'));
        $user->save();

        auth()->logout();

        return redirect('/')->with('message', 'Silahkan Login lagi dengan password baru Anda');


    }

    public function index(){

        if(auth()->user()->role != User::ROLE_MANAGER) redirect('/');

        return view('user.index')->with('user', User::all());
    }
}
