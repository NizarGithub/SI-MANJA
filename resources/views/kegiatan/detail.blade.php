@extends('template')


@section('content')

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="content">
                    <a href="{{URL::to('/')}}"><i class="ti-arrow-left"></i> Kembali</a>
                    <h4>{{$kegiatan->name}}</h4>
                    <div class="pull-left">oleh : {{$kegiatan->pic}}</div>
                    <div class="pull-right">{{$kegiatan->date}}</div>
                    <div class="clearfix"></div>
                    <hr>
                    <p>{{$kegiatan->description}}</p>
                    <br>
                    <span style="font-weight: bold">Kecamatan :</span><br>
                    {{$kegiatan->kecamatan->name}}
                    <br><br>
                    <span style="font-weight: bold">Anggota :</span><br>
                    {{$kegiatan->team}}
                    <br><br>
                    <span style="font-weight: bold">Tempat : </span><br>
                    {{$kegiatan->place}}
                    <br><br>
                    <span style="font-weight: bold">Status :</span><br>
                    <i class="fa fa-circle text-{{($kegiatan->status==\App\Kegiatan::STATUS_BELUM_DIKERJAKAN) ? 'danger' : 'success'}}"></i> {{$kegiatan->status}}

                </div>
            </div>
        </div>
    </div>

    @if($kegiatan->laporan)
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="content">
                        <h4>Ringkasan Laporan</h4>

                        <div style="">Diterima : <img style="    width: 20px;" src="{{URL::to('/assets/img/accepted.png')}}"></div>
                        <div class="clearfix"></div>
                        <hr>
                        
                        {!! $kegiatan->laporan->note !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(auth()->user()->role == \App\User::ROLE_OFFICER)
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="content">
                    <div class="text-center">
                        <a href="#" class="btn btn-fill btn-danger">Hapus</a>
                        <a href="#" class="btn btn-fill btn-warning">Edit</a>
                        @if(!$kegiatan->laporan)
                        <a href="{{URL::to('kegiatan/laporan/create/'.$kegiatan->id)}}" class="btn btn-fill btn-primary">Buat Laporan</a>
                        @endif
                            <hr>
                        <ul style="text-align:left">
                            <li><small>Buat laporan jika kegiatan telah dilaksanakan</small></li>
                            <li><small>Upload gambar kegiatan dan detail lainnya</small></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(auth()->user()->role == \App\User::ROLE_MANAGER)

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="content">
                        <div class="text-center">
                            @if($kegiatan->laporan)
                            <h4>Penilaian :</h4>
                            <select id="example">
                                @for($i = 1 ; $i <=10 ; $i++)
                                    <option value="{{$i}}" <?php echo ($kegiatan->rating == $i) ? "selected" : "" ?>>{{$i}}</option>
                                @endfor
                            </select>
                            @endif
                            @if($kegiatan->laporan AND $kegiatan->is_received == false)

                                <a href="{{URL::to('kegiatan/laporan/received/'.$kegiatan->id)}}" class="btn btn-fill btn-primary">Terima Laporan</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('css')

@endsection

@section('js')
    <script type="text/javascript">
        $(function() {
            $('#example').barrating({
                theme: 'fontawesome-stars',
                onSelect:function(value, text, event){
                    $.ajax({
                        method: "POST",
                        url: "{{URL::to('kegiatan/laporan/rating/'.$kegiatan->id)}}",
                        data: { rate: value }
                    })
                            .done(function( msg ) {
//                                alert( "Data Saved: " + msg );
                            });
                }
            });
        });
    </script>


@endsection