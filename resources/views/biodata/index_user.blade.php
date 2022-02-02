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
                {{-- <h1 class="m-0 text-dark">Karyawan {{ $biodata }}</h1> --}}
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
                                        <h3 class="card-title">Biodata</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        @if (session('message'))
                                        <div class="alert alert-success alert-dismissible show fade">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert">
                                                    <span>×</span>
                                                </button>
                                                {{ session('message') }}
                                            </div>
                                        </div>
                                        @endif
                                        {{-- <a href="{{ url('') }}/biodata_pdf" target="_blank"
                                            title="Unduh Dokumen (PDF)" class="btn btn-md btn-primary mb-3"><i
                                                class="fa fa-print">
                                                Cetak</i></a> --}}
                                        <table id="table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nik</th>
                                                    <th>Nama</th>
                                                    <th>TTL</th>
                                                    <th>No Hp</th>
                                                    <th>Alamat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($biodata as $biodata)
                                                @php
                                                $date = strtotime($biodata->tanggal_lahir);
                                                @endphp
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $biodata->nik }}</td>
                                                    <td>{{ $biodata->nama }}</td>
                                                    <td>
                                                        @if ($biodata->tempat_lahir == null or $biodata->tanggal_lahir
                                                        == null)

                                                        @else
                                                        {{ $biodata->tempat_lahir }}, {{
                                                        date('d-m-Y', $date)}}
                                                        @endif

                                                    </td>
                                                    <td>{{ $biodata->no_hp }}</td>
                                                    <td>{{ $biodata->alamat }}</td>
                                                    <td>
                                                        <a href="{{ route('biodata_edit_user',$biodata->id) }}"
                                                            class="btn btn-sm btn-primary edit"> <i class="fa fa-pen">
                                                            </i></a>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
