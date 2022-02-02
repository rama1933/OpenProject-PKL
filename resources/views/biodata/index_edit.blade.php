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
                                        <h3 class="card-title">Edit Biodata</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @foreach ($biodata as $biodata)
                                        <form method="post" id="form-edit" action="{{ url('/biodata_update') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $biodata->id }}">
                                            <div class="row">
                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="nik" placeholder="Nik"
                                                        value="{{ $biodata->nik }}" data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="nama"
                                                        value="{{ $biodata->nama }}" placeholder="Nama"
                                                        data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="tempat_lahir"
                                                        value="{{ $biodata->tempat_lahir }}" placeholder="Tempat Lahir"
                                                        required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="date" class="form-control" name="tanggal_lahir"
                                                        value="{{ $biodata->tanggal_lahir }}" required>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <input type="text" class="form-control" name="no_hp"
                                                        value="{{ $biodata->no_hp }}" placeholder="No Hp"
                                                        data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <textarea class="form-control" name="alamat" rows="5"
                                                        placeholder="Alamat" data-rule="required"
                                                        required>{{ $biodata->alamat }}</textarea>
                                                </div>
                                                <div class="btn-group col-lg-12 justify-content-center">
                                                    <div class="text-center">
                                                        <button class="btn btn-lg btn-success mr-3"
                                                            type="submit">Simpan</button>
                                                    </div>

                                                </div>
                                            </div>

                                        </form>
                                        @endforeach
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
