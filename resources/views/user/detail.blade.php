@extends('template')


@section('content')


    <div class="row">

        <div class="col-md-12">

            <div class="card">


                <div class="header">
                    <h4 class="title">Detail Pengguna</h4>
                </div>
                <div class="content row">
                    <hr>
                    <div class="col-xs-12" style="line-height: 26px">
                        <span style="font-size: 20pt">{{$user->name}} </span> <br>
                        {{$user->address}} <br>
                        <span>- Kec : {{($user->kecamatan) ? $user->kecamatan->name : ''}} </span><br>
                        <span>- HP : {{$user->hp}}</span>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="col-xs-6 text-center">
                        <i class="ti-user"></i> <br>
                        <small>Username</small><br>
                        <span style="    font-size: 16pt;font-weight: bold;">{{$user->username}}</span>
                    </div>
                    <div class="col-xs-6 text-center">
                        <i class="ti-stamp"></i>
                        <br>
                        <small>Sebagai</small><br>
                        <span style="    font-size: 16pt;font-weight: bold;">{{$user->role}}</span>
                    </div>

                </div>
            </div>

            <div class="clearfix"></div>
            <div class="pull-right">
                <a href="{{URL::to('user/edit/'.$user->id)}}" class="btn btn-info btn-fill">Edit</a>
                <a href="{{URL::to('user/delete/'.$user->id)}}" class="btn btn-danger btn-fill">Hapus</a>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>

    </script>

@endsection