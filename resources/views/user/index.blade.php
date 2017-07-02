@extends('template')


@section('content')


    <div class="row">

        <div class="col-md-12">

            <div class="card">


                <div class="header">
                    <h4 class="title">Daftar Pengguna</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                        <th>Nama</th>
                        <th>Kecamatan</th>
                        </thead>
                        <tbody>
                        <?php $row = 0; ?>
                        @foreach ($user as $k)
                            <?php $row++; ?>

                            <tr class="row-table" data-row="{{$row}}" data-id = {{$k->id}}>
                                <td>{{$k->name}}</td>
                                <td>{{$k->kecamatan->name}}</td>

                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <a href="{{URL::to('user/create')}}" class="float">
        <i class="fa fa-plus my-float"></i>
    </a>
@endsection

@section('js')
    <script>
        $('.row-table').click(function (e) {
            e.preventDefault();
            window.location = '{{URL::to("user/detail")}}/'+$(this).data('id');

        })
    </script>

    @endsection