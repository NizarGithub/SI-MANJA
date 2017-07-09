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

                        @if($kegiatan->is_received)
                            <div style="">Diterima : <img style="    width: 20px;" src="{{URL::to('/assets/img/accepted.png')}}"></div>
                        @else
                            <div style="">Diterima : <img style="    width: 20px;" src="{{URL::to('/assets/img/not_received.png')}}"></div>
                            @if($kegiatan->reject_reason AND $kegiatan->status == \App\Kegiatan::STATUS_BELUM_DIKERJAKAN)
                                <br><br>
                                Alasan ditolak : <br>
                                <div style="    border: 1px dashed #EB5E28;
    padding: 10px;
    margin: 10px;">{{$kegiatan->reject_reason}}</div>
                            @endif
                        @endif
                        <div class="clearfix"></div>
                        <hr>
                        
                        {!! $kegiatan->laporan->note !!}
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{--@if(auth()->user()->role == \App\User::ROLE_OFFICER)--}}
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="card">
                <div class="content">
                    <div class="text-center">
                        <a href="{{URL::to('kegiatan/delete/'.$kegiatan->id)}}" class="btn btn-fill btn-danger" onclick="return confirm('Anda yakin untuk menghapus ?')">Hapus</a>
                        <a href="{{URL::to('kegiatan/edit/'.$kegiatan->id)}}" class="btn btn-fill btn-warning">Edit</a>
                        @if($kegiatan->status == \App\Kegiatan::STATUS_BELUM_DIKERJAKAN)
                        <a href="{{URL::to('kegiatan/laporan/create/'.$kegiatan->id)}}" class="btn btn-fill btn-primary">Buat Laporan</a>
                        {{--@else--}}
                            {{--<a href="{{URL::to('kegiatan/laporan/create/'.$kegiatan->id)}}" class="btn btn-fill btn-primary">Buat Laporan</a>--}}
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
    {{--@endif--}}

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
                            @if($kegiatan->status == \App\Kegiatan::STATUS_SUDAH_DIKERJAKAN)
                            @if($kegiatan->is_received == false)
                                    <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-fill btn-danger">Tolak Laporan</a>
                                    <a href="{{URL::to('kegiatan/laporan/received/'.$kegiatan->id)}}" class="btn btn-fill btn-primary">Terima Laporan</a>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
@endsection


@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="" method="post" action="{{URL::to('kegiatan/laporan/unreceived/'.$kegiatan->id)}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Yakin Menolak Laporan ?</h4>
                </div>
                <div class="modal-body">

                        <div class="">
                        <div class="form-group">
                            <label>Alasan</label>
                            <textarea name="reason" class="form-control border-input" placeholder="Berikan alasan laporan ditolak" ></textarea>
                        </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan"></input>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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