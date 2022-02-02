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
        <thead>
            <tr>
                <th>No</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>No Hp</th>
                <th>Alamat</th>
                <th>Merk</th>
                <th>Type</th>
                <th>Jenis</th>
                <th>Warna</th>
                <th>Tahun Pembuatan</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendaftaran as $pendaftaran)
            <tr>
                <td>{{$loop->iteration}}</td>
                @foreach ($pendaftaran->biodata as $a)
                @php
                $date = strtotime($a->tanggal_lahir);
                @endphp
                <td>{{ $a->nik }}</td>
                <td>{{ $a->nama }}</td>
                <td>
                    @if ($a->tempat_lahir == null or $a->tanggal_lahir
                    == null)

                    @else
                    {{ $a->tempat_lahir }}, {{
                    date('d-m-Y', $date)}}
                    @endif

                </td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
