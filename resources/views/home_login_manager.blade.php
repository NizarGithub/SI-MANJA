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

        .list li:not(:last-child){

            border-bottom: 1px solid #F1EAE0;
        }

        .list li a {
            color: #000;
            font-weight: bold;
        }
    </style>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="content">
                    <ul class="list nav nav-pills nav-stacked">
                        @foreach($kecamatans as $kecamatan)
                            <li>
                                <a href="{{URL::to('kegiatan/kecamatan/'.$kecamatan->code)}}">{{$kecamatan->name}}</a>
                                <div style="float: right;margin-top: -28px;"><i class="ti-angle-right"></i></div>
                            </li>
                        @endforeach
                    </ul>
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