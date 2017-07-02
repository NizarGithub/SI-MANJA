@extends('template')


@section('content')
    <style>
        .table-striped tr:nth-of-type(2n) td{
            border: none;
        }

        /*.table-striped tr:nth-of-type(2n+1){*/
        /*background: #FFFCF5;*/
        /*}*/

        /*.table-striped tr:nth-of-type(2n){*/
        /*background: #FFF;*/
        /*}*/
    </style>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="content">

                    <a href="{{URL::to('kegiatan/create')}}" class="btn pull-right btn-fill btn-small btn-primary">
                        <i class="fa fa-plus"></i> Tambah Kegiatan
                    </a><div class="clearfix"></div><hr>
                    <i class="fa fa-circle text-success"> </i>sudah dikerjakan
                    <i class="fa fa-circle text-danger"> </i>belum dikerjakan
                    {{--<i class="fa fa-circle text-success"> sudah dikerjakan  --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        @foreach($kegiatans as $kegiatan)
            <a href="{{URL::to('kegiatan/'.$kegiatan->id)}}">
        <div class="col-md-6 col-xs-12">
            <div class="card">
                <div class="content">

                    <h4 class="title">
                        <i class="fa fa-circle text-{{($kegiatan->status==\App\Kegiatan::STATUS_BELUM_DIKERJAKAN) ? 'danger' : 'success'}}"></i> {{$kegiatan->name}}
                    </h4>


                    <hr>
                    {{substr($kegiatan->description,0,200)}}
                    <hr>
                    <div class="col-xs-6">
                        oleh : {{$kegiatan->pic}}
                    </div>
                    <div class="col-xs-6">
                        {{$kegiatan->date}}
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
            </a>
        @endforeach
    </div>


    <a href="{{URL::to('kegiatan/create')}}" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>

@endsection

@section('js')

@endsection