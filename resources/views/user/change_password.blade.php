@extends('template')


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Ubah Password</h4>
                </div>
                <div class="content">
                    <form class="" method="post" action="{{URL::to('change_password')}}">

                        <div class="">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="password" name="old" class="form-control border-input" placeholder="Password Lama" >
                            </div>
                        </div>

                        <div class="">
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" name="new" class="form-control border-input" placeholder="Password Baru" >
                            </div>
                        </div>

                        <div class="">
                            <div class="form-group">
                                <label>Konfirmasi Password Baru</label>
                                <input type="password" name="new_confirmation" class="form-control border-input" placeholder="Konfirmasi Password Baru" >
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
