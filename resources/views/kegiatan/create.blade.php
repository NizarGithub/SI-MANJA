@extends('template')


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">{{isset($kegiatan) ? "Edit Kegiatan" : "Tambah Kegiatan"}}</h4>
                </div>
                <div class="content">
                    <form class="" method="post" action="{{isset($kegiatan) ? URL::to('kegiatan/edit/'.$kegiatan->id) : URL::to('kegiatan/create')}}">
                        {{--{{ csrf_field() }}--}}
                        <div class="">
                            <div class="form-group">
                                <label>No. Kegiatan</label>
                                <input name="number" type="text" class="form-control border-input" placeholder="No. Kegiatan" value="{{isset($kegiatan->number) ? $kegiatan->number : ''}}" >
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input name="name" type="text" class="form-control border-input" placeholder="Nama Kegiatan" value="{{isset($kegiatan->name) ? $kegiatan->name : ''}}" >
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input name="date" type="date" class="form-control border-input" placeholder="Tgl. Kegiatan" value="{{isset($kegiatan->date) ? $kegiatan->date : ''}}" >
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input name="place" type="text" class="form-control border-input" placeholder="Lokasi Kegiatan" value="{{isset($kegiatan->place) ? $kegiatan->place : ''}}" >
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label>Penanggung Jawab</label>
                                <input name="pic" type="text" class="form-control border-input" placeholder="Penanggung Jawab" value="{{isset($kegiatan->pic) ? $kegiatan->pic : ''}}" >
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label>Anggota</label>
                                <textarea name="team" type="text" class="form-control border-input" placeholder="Anggota" >{{isset($kegiatan->team) ? $kegiatan->team : ''}}</textarea>
                            </div>
                        </div>
                        <div class="">
                            <div class="form-group">
                                <label>Catatan</label>
                                <input name="note" type="text" class="form-control border-input" placeholder="Catatan" value="{{isset($kegiatan->note) ? $kegiatan->note : ''}}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" type="text" class="form-control border-input" placeholder="Penjelasan mengenai Kegiatan yang akan dilaksanakan" >{{isset($kegiatan->description) ? $kegiatan->description : ''}}</textarea>
                        </div>

                        <div class="text-center">
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-fill btn-wd" value="Simpan" >
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
