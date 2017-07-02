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

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Tambah Kecamatan</h4>
                </div>
                <div class="content">
                    <form class="" method="post" action="{{URL::to('kecamatan')}}">
                        {{ csrf_field() }}
                        <div class="">
                            <div class="form-group">
                                <label>Kode Kecamatan</label>
                                <input name="code" id="edit-code" type="text" class="form-control border-input" placeholder="Kode Kecamatan" maxlength="2">
                            </div>
                            <div class="form-group">
                                <label>Nama Kecamatan</label>
                                <input name="name" id="edit-name" type="text" class="form-control border-input" placeholder="Nama Kecamatan" >
                            </div>
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

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Daftar Kecamatan</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <th>Kode</th>
                        <th>Nama</th>
                        </thead>
                        <tbody>
                        <?php $row = 0; ?>
                        @foreach ($kecamatan as $k)
                            <?php $row++; ?>
                        <tr class="row-table" data-row="{{$row}}">
                            <td>{{$k->code}}</td>
                            <td>{{$k->name}}</td>

                        </tr>
                        <tr style="display: none" class="row-table-action-{{$row}}" >
                            <td>
                                <a href="{{URL::to('kecamatan/delete/'.$k->code)}}"><i class="ti-trash"></i> hapus</a>
                            </td>
                            <td >
                                <a href="#" class="edit" data-editname="{{$k->name}}" data-editcode="{{$k->code}}"><i class="ti-pencil"></i> edit</a>
                            </td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script>
        $('.row-table').click(function (e) {
            var row = $(this).data('row');
            $('.row-table-action-'+row).toggle();
        })

        $('.edit').click(function (e) {
            e.preventDefault();
            $('#edit-name').val($(this).data('editname'));
            $('#edit-code').val($(this).data('editcode'));
            window.scrollTo(0, 0);

        })
    </script>
@endsection