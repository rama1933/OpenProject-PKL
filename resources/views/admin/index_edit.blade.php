@extends('layout.master')
@section('css')
<style>
    .zoom:hover {
        transform: scale(3);
        /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
</style>
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card-body">
                    <div class="row">

                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Data pendaftaran</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @forelse ($pendaftaran as $pendaftaran)
                                        <form method="post" id="form-edit"
                                            action="{{ url('/pendaftaran_admin_update') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="pendaftaran_id" value="{{ $id }}">
                                            <div class="row">

                                                <div class="form-group col-lg-12">
                                                    <input type="text" class="form-control" name="nopol"
                                                        value="{{ $pendaftaran->nopol }}" placeholder="No Polisi"
                                                        data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <span>Tangal STNK</span>
                                                    <input type="date" class="form-control" name="tgl_stnk"
                                                        value="{{ $pendaftaran->tgl_stnk }}" placeholder="" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <span>Tangal Pajak</span>
                                                    <input type="date" class="form-control" name="tgl_pajak"
                                                        value="{{ $pendaftaran->tgl_pajak }}" placeholder="" required />
                                                </div>
                                                <div class="btn-group col-lg-12 justify-content-center">
                                                    <div class="text-center">
                                                        <button class="btn btn-lg btn-success mr-3"
                                                            type="submit">Simpan</button>
                                                    </div>

                                                </div>
                                            </div>

                                        </form>
                                        @empty
                                        <form method="post" id="form-edit"
                                            action="{{ url('/pendaftaran_admin_store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="pendaftaran_id" value="{{ $id }}">
                                            <div class="row">

                                                <div class="form-group col-lg-12">
                                                    <input type="text" class="form-control" name="nopol"
                                                        placeholder="No Polisi" data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <span>Tanggal STNK</span>
                                                    <input type="date" class="form-control" name="tgl_stnk"
                                                        placeholder="" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <span>Tanggal Pajak</span>
                                                    <input type="date" class="form-control" name="tgl_pajak"
                                                        placeholder="" required />
                                                </div>

                                                <div class="btn-group col-lg-12 justify-content-center">
                                                    <div class="text-center">
                                                        <button class="btn btn-lg btn-success mr-3"
                                                            type="submit">Simpan</button>
                                                    </div>

                                                </div>
                                            </div>

                                        </form>
                                        @endforelse




                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>


</section>



@endsection
@section('js')


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah2').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp2").change(function(){
        readURL2(this);
    });


function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
@endsection
