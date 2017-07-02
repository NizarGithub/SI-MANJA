@extends('template')


@section('content')
    <div class="row">

    <div class="col-md-12">
    <div class="card">
    <div class="header">
    <h4 class="title">{{isset($user) ? "Edit Pengguna" : "Tambah Pengguna"}}</h4>
    </div>
    <div class="content">
        <form class="" method="post" action="{{isset($user) ? URL::to('user/edit/'.$user->id) : URL::to('user/create')}}">
            {{--{{ csrf_field() }}--}}
            <div class="">
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" class="form-control border-input" placeholder="username" value="{{isset($user->username) ? $user->username : ''}}" >
                </div>
            </div>
            @if(!isset($user))
            <div class="">
                <div class="form-group">
                    <label>Password (default)</label>
                    <input type="text" class="form-control border-input" placeholder="12345678" disabled value="12345678" >
                </div>
            </div>
            @endif
            <div class="">
                <div class="form-group">
                    <label>Nama</label>
                    <input name="name" type="text" class="form-control border-input" placeholder="Nama Lengkap" value="{{isset($user->name) ? $user->name : ''}}">
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label>HP</label>
                    <input name="hp" type="text" class="form-control border-input" placeholder="No. HP" value="{{isset($user->hp) ? $user->hp : ''}}">
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="address" class="form-control border-input" placeholder="alamat" >{{isset($user->address) ? $user->address : ''}}</textarea>
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label>Kecamatan</label>
                    <select name="kecamatan_code" class="form-control border-input">
                        @foreach (\App\Kecamatan::all() as $key => $value)
                            <option value="{{ $value->code }}" {{ (isset($user->kecamatan_code) AND $user->kecamatan_code == $value->code) ? 'selected' : ''}}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label>Role</label><br>
                    <label><input type="radio" name="role" value="{{App\User::ROLE_MANAGER}}" {{ (isset($user->role) AND $user->role == App\User::ROLE_MANAGER) ? 'checked' : ''}}> {{App\User::ROLE_MANAGER}}</label><br>
                    <label><input type="radio" name="role" value="{{App\User::ROLE_OFFICER}}" {{ (isset($user->role) AND $user->role == App\User::ROLE_OFFICER) ? 'checked' : ''}}> {{App\User::ROLE_OFFICER}}</label>
                </div>
            </div>
            <div class="text-center">
                <div class="form-group">
                    <input type="submit" class="btn btn-info btn-fill btn-wd" value="Simpan" >
                </div>
            </div>

        </form>
    <div class="footer">

    <hr>
        <div class="chart-legend">
            <i class="fa fa-circle text-warning"></i> <small>Pengguna bisa mengubah password setelah login</small>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
