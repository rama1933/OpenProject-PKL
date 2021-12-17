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
                                        <h3 class="card-title">Tambah Data Pendaftaran</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form method="post" id="form-create" action="{{ url('/pendaftaran_store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                {{-- <div class="form-group">
                                                    <label for="nik" style="color: white">NIK</label>
                                                    <input type="text" name="nik" class="form-control" maxlength="16"
                                                        onkeypress="return hanyaAngka(event)" placeholder="NIK"
                                                        data-rule="minlen:4" required />
                                                </div> --}}


                                                <div class="form-group col-lg-6">
                                                    <input type="text" value="{{ auth()->user()->username }}"
                                                        class="form-control" name="nik" placeholder="Nik"
                                                        data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="nama"
                                                        placeholder="Nama Pemilik" data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="no_hp"
                                                        placeholder="No Hp" data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="nopol"
                                                        placeholder="Nopol " data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="merk"
                                                        placeholder="Merk " data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="type"
                                                        placeholder="Type" data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="warna"
                                                        placeholder="Warna " data-rule="minlen:4" required />
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <input type="text" class="form-control" name="tahun"
                                                        placeholder="Tahun Pembuatan " data-rule="minlen:4"
                                                        onkeypress="return hanyaAngka(event)" maxlength="4" required />
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <select name="jenis_id" class="form-control" required>
                                                        <option value="">Jenis</option>
                                                        @foreach ($jenis as $jenis)
                                                        <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <textarea class="form-control" name="alamat" rows="5"
                                                        placeholder="Alamat" data-rule="required" required></textarea>
                                                </div>


                                                {{-- <div class="form-group col-lg-12">
                                                    <input placeholder="Tanggal Pengajuan" type="text"
                                                        onfocus="(this.type='date')" onblur="(this.type='text')"
                                                        class="form-control textbox-n" name="tanggal"
                                                        placeholder="Subject" required />
                                                </div> --}}



                                                <div class="btn-group col-lg-12 justify-content-center">
                                                    <div class="text-center">
                                                        <button class="btn btn-lg btn-success mr-3"
                                                            type="submit">Simpan</button>
                                                    </div>

                                                </div>
                                            </div>
                                            <br>


                                        </form>

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
