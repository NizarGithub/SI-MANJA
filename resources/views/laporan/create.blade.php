@extends('template')


@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <a href="{{URL::to('/kegiatan/'.$kegiatanId)}}"><i class="ti-arrow-left"></i> Kembali</a>
                    <h4 class="title">Laporan Kegiatan</h4>
                    <small>Uraikan deskrpsi singkat selama kegiatan berlangsung</small>
                </div>
                <div class="content">
                    <form enctype="multipart/form-data" class="" method="post" action="{{URL::to('kegiatan/laporan/create/'.$kegiatanId)}}">

                        {{--{{ csrf_field() }}--}}
                        <div class="">
                            <div class="form-group">
                                <label>Laporan Selama Kegiatan</label>
                                <div id="editor" contenteditable="true">@if($kegiatan->laporan AND $kegiatan->laporan->note){{$kegiatan->laporan->note}}@endif
                                </div>
                            </div>
                        </div>
                        <textarea id="note" name="note" hidden >@if($kegiatan->laporan AND $kegiatan->laporan->note){{$kegiatan->laporan->note}}@endif</textarea>
                        <hr>

                        {{--<h4>Foto Kegiatan</h4>--}}
                        {{--<!-- The fileinput-button span is used to style the file input field as button -->--}}
                        {{--<a href="#" class="btn btn-fill btn-warning pull-right" id="addImage">Tambah Foto</a>--}}

                        {{--<div class="clearfix"></div>--}}
                        {{--<hr>--}}
                        {{--<div class="wrapper-foto">--}}
                            {{--<div class="form-group text-center">--}}
                                {{--<input type="file" name="images[]" id="file" class="" data-multiple-caption="{count} files selected" />--}}
                                {{--<input name="images[]" type="file" multiple id="file" class="form-control border-input inputfile" placeholder="Foto kegiatan" >--}}

                                {{--<label for="file"><span><i class="ti-upload"></i> Upload Foto</span></label>--}}
                                {{--<input name="caption[]" type="text" class="form-control border-input" placeholder="Keterangan Foto" >--}}
                                {{--<a href="#" class="btn btn-fill btn-danger removeImage" ><i class="ti-close"></i>Hapus</a>--}}

                            {{--</div>--}}
                                  {{--<div class="clearfix"></div>--}}
                            {{--</div>--}}
                        <hr>
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

@section('js')
    <script type="text/javascript">
        $('#editor').summernote({
            height: 300,
            toolbar: [
                ['para', ['ul', 'ol', 'paragraph']],
                ['style', ['bold', 'italic', 'underline', 'clear']]
            ],
            callbacks: {
                onChange: function(contents, $editable) {
                    $('#note').val(contents);
                }
            }
        });
//        $('#addImage').click(function (e) {
//            e.preventDefault();
//            var html = '<div class="form-group text-center"> ' +
//                    '<input type="file" name="images[]" id="file" class="" data-multiple-caption="{count} files selected" multiple /> ' +
//                    '<label for="file"><span><i class="ti-upload"></i> Upload Foto</span></label> ' +
//                    '<input name="caption[]" type="text" class="form-control border-input" placeholder="Keterangan Foto" > ' +
//                    '<a href="#" class="btn btn-fill btn-danger removeImage" ><i class="ti-close"></i>Hapus</a> ' +
//                    '</div>';
//            $('.wrapper-foto').append(html);
//            $('.removeImage').click(function (e) {
//                e.preventDefault();
//                $(this).parent('.form-group').remove();
//            })
//        });
//
//
//        $('.inputfile').change(function(e){
//
//        });
//        var inputs = document.querySelectorAll( '.inputfile' );
//        Array.prototype.forEach.call( inputs, function( input )
//        {
//            var label	 = input.nextElementSibling,
//                    labelVal = label.innerHTML;
//
//            input.addEventListener( 'change', function( e )
//            {
//                var fileName = '';
//                if( this.files && this.files.length > 1 )
//                    fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
//                else
//                    fileName = e.target.value.split( '\\' ).pop();
//
//                if( fileName )
//                    label.querySelector( 'span' ).innerHTML = fileName;
//                else
//                    label.innerHTML = labelVal;
//            });
//        });


    </script>

@endsection
