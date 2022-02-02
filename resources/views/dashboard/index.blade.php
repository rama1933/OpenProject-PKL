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
                {{-- <h1 class="m-0 text-dark">Karyawan {{ $type }}</h1> --}}
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    {{-- <li class="breadcrumb-item"><a href="#">Data pendaftaran</a></li> --}}
                    {{-- <li class="breadcrumb-item active">Data pendaftaran</li> --}}
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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">

                                        <h3 class="card-title">DASHBOARD</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body"
                                        style="background-image: url('{{ asset('/logo/bg.jpg')}}');background-size: 100% 100%;background-repeat: no-repeat;height:500px">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 mb-4">
                                                <div class="card  shadow h-100 py-2">
                                                    <div class="card-body">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col mr-2">
                                                                <div
                                                                    class="h5 text-xl font-weight-bold text-uppercase text-center">
                                                                    Selamat Datang Di UPPD Samsat Kandangan</div>

                                                            </div>
                                                            <div class="col-auto">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


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
    // let list_karyawan = [];
    const table = $("#table").DataTable({
            "language": {
        "sProcessing":    "Sedang Diproses",
        "sLengthMenu":    "Tampilkan _MENU_ Data",
        "sZeroRecords":   "Data Kosong",
        "sEmptyTable":    "Data Kosong",
        "sInfo":          "Menampilkan dari _START_ sampai _END_ data dari total _TOTAL_ data",
        "sInfoEmpty":     "Menampilkan data dari 0 hingga 0 dari total 0 data",
        "sInfoFiltered":  "(di filter dari _MAX_ data)",
        "sInfoPostFix":   "",
        "sSearch":        "Cari:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Sedang Diproses...",
        "oPaginate": {
            "sFirst":    "Pertama",
            "sLast":    "Terakhir",
            "sNext":    "Lanjut",
            "sPrevious": "Kembali"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
          "responsive": true,
          "autoWidth": false,
          "pageLength":10,
          "lengthMenu":[[10,25,50,100,-1],[10,25,50,100,'semua']],
          "bLengthChange":true,
          "bFilter":true,
          "bInfo":true,
          "processing":true,
            });



function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))

        return false;
      return true;
    }
</script>
@endsection
