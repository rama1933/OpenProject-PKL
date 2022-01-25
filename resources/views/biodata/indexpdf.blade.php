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
    <h3 style="text-align: center;">DATA MASTER BIODATA</h3>
    <table id="table" style="width: 100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>No Hp</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($biodata as $biodata)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $biodata->nik }}</td>
                <td>{{ $biodata->nama }}</td>
                <td>{{ $biodata->no_hp }}</td>
                <td>{{ $biodata->alamat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
