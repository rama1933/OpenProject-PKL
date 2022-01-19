<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran</title>
</head>
<style>
    /* Create two equal columns that floats next to each other */
    .column {
        float: left;
    }

    .left {
        width: 10%;
    }

    .right {
        width: 90%;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        clear: both;
    }

    table,
    th,
    td {
        border: 1px solid;
        border-collapse: collapse;
    }

    header {
        position: fixed;
        top: -30px;
        left: 0px;
        right: 0px;
    }

    footer {
        position: fixed;
        bottom: -10px;
        left: 0px;
        right: 0px;
    }
</style>

<body>
    <header>
        <hr>
    </header>
    <footer>
        <hr>
    </footer>
    <h3 style="text-align: center;">DATA PENDAFTARAN</h3>
    <table id="table" style="width: 100%">
        {{-- <thead>
            <tr>

                <th>Nama</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>Merk</th>
                <th>Type</th>
                <th>Jenis</th>
                <th>Warna</th>
                <th>Tahun Pembuatan</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead> --}}
        <tbody>
            @foreach ($pendaftaran as $pendaftaran)
            <tr>
                <th style="text-align: left">Nik</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $pendaftaran->nik }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Nama</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $pendaftaran->nama }}</td>
            </tr>
            <tr>
                <th style="text-align: left">No Hp</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $pendaftaran->no_hp }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Alamat</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $pendaftaran->alamat }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Merk</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $pendaftaran->merk }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Type</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $pendaftaran->type }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Type</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $pendaftaran->type }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Jenis</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">
                    @foreach ($pendaftaran->jenis as $a)
                    {{ $a->jenis }}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th style="text-align: left">Warna</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $pendaftaran->warna }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Tahun</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $pendaftaran->warna }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Tanggal Pendaftaran</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ date('d-m-Y',strtotime($pendaftaran->tanggal)) }}</td>
            </tr>
            @forelse ($pendaftaran->pendaftarans as $a)
            <tr>
                <th style="text-align: left">Nopol</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ $a->nopol }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Tgl Stnk</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ date('d-m-Y',strtotime($a->tgl_stnk)) }}</td>
            </tr>
            <tr>
                <th style="text-align: left">Tgl Pajak</th>
                <td style="text-align: center">:</td>
                <td style="padding-left: 10px">{{ date('d-m-Y',strtotime($a->tgl_pajak)) }}</td>
            </tr>

            @empty
            <tr>
                <th style="text-align: left">Nopol</th>
                <td style="text-align: center">:</td>
                <td></td>
            </tr>
            <tr>
                <th style="text-align: left">Tgl Stnk</th>
                <td style="text-align: center">:</td>
                <td></td>
            </tr>
            <tr>
                <th style="text-align: left">Tgl Pajak</th>
                <td style="text-align: center">:</td>
                <td></td>
            </tr>
            @endforelse
            @endforeach
        </tbody>
    </table>
</body>

</html>
