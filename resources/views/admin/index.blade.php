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
                {{-- <h1 class="m-0 text-dark">Karyawan {{ $jenis }}</h1> --}}
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

                                        {{-- <a href="{{ route('pendaftaran_tambah') }}"
                                            class="btn btn-primary float-right">
                                            <i class="fa fa-plus"> Tambah Data</i></a> --}}

                                        <h3 class="card-title">Data Pendaftaran</h3>
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
                                        <a href="{{ url('') }}/pendaftaran_admin_pdf" title="Unduh Dokumen (PDF)"
                                            target="_blank" class="btn btn-md btn-primary mb-3"><i class="fa fa-print">
                                                Cetak</i></a>
                                        <div class="table-responsive">
                                            <table id="table" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nik</th>
                                                        <th>Nama</th>
                                                        <th>No Hp</th>
                                                        <th>Alamat</th>
                                                        <th>Merk</th>
                                                        <th>Type</th>
                                                        <th>Jenis</th>
                                                        <th>Warna</th>
                                                        <th>Tahun Pembuatan</th>
                                                        <th>Tanggal Daftar</th>
                                                        <th>Nopol</th>
                                                        <th>Tanggal STNK</th>
                                                        <th>Tanggal Pajak</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pendaftaran as $pendaftaran)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        @foreach ($pendaftaran->biodata as $a)
                                                        <td>{{ $a->nik }}</td>
                                                        <td>{{ $a->nama }}</td>
                                                        <td>{{ $a->no_hp }}</td>
                                                        <td>{{ $a->alamat }}</td>
                                                        @endforeach
                                                        <td>
                                                            @foreach ($pendaftaran->merk as $a)
                                                            {{ $a->merk }}
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach ($pendaftaran->type as $a)
                                                            {{ $a->type }}
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach ($pendaftaran->jenis as $a)
                                                            {{ $a->jenis }}
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $pendaftaran->warna }}</td>
                                                        <td>{{ $pendaftaran->tahun }}</td>
                                                        <td>{{ date('d-m-Y',strtotime($pendaftaran->tanggal)) }}</td>

                                                        @forelse ($pendaftaran->pendaftarans as $a)

                                                        <td>{{ $a->nopol }}</td>
                                                        <td>{{ date('d-m-Y',strtotime($a->tgl_stnk)) }}</td>
                                                        <td>{{ date('d-m-Y',strtotime($a->tgl_pajak)) }}</td>
                                                        @empty
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        @endforelse
                                                        <td>
                                                            @forelse ($pendaftaran->pendaftarans as $a)
                                                            @if ($a->nopol == null and $a->tgl_stnk == null and
                                                            $a->tgl_stnk == null)
                                                            Belum DI Verifikasi
                                                            @else
                                                            Selesai
                                                            @endif
                                                            @empty
                                                            Belum DI Verifikasi
                                                            @endforelse
                                                        </td>

                                                        <td style="text-align: center">
                                                            <a href="{{ route('pendaftaran_admin_edit',$pendaftaran->id) }}"
                                                                class="btn btn-sm btn-primary  mb-3"> <i class="">
                                                                    Verifikasi</i></a>

                                                            <a href="{{ route('pendaftaran_admin_pdf_detail',$pendaftaran->id) }}"
                                                                class="btn btn-sm btn-info" target="_blank"> <i
                                                                    class="fa fa-print">
                                                                </i></a>

                                                            {{-- <a
                                                                href="{{ route('pendaftaran_hapus',$pendaftaran->id) }}"
                                                                class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                                                    onclick="return confirm('Hapus data {{  $pendaftaran->nama  }} ?')">
                                                                </i></a> --}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
          "responsive": false,
          "autoWidth": true,
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
