<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Masuk Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('') }}/logo/hss.png" rel="icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ url('') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link href="{{ asset('') }}Knight/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}Knight/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <!-- Theme style -->
    {{--
    <link rel="stylesheet" href="{{ url('') }}/dist/css/adminlte.min.css"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        body {
            background-color: #dee9ff;
        }

        .registration-form {
            padding: 50px 0;
        }

        .registration-form form {
            background-color: #fff;
            max-width: 600px;
            margin: auto;
            padding: 50px 70px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .form-icon {
            text-align: center;
            background-color: #5891ff;
            border-radius: 50%;
            font-size: 40px;
            color: white;
            width: 100px;
            height: 100px;
            margin: auto;
            margin-bottom: 50px;
            line-height: 100px;
        }

        .registration-form .item {
            border-radius: 20px;
            margin-bottom: 25px;
            padding: 10px 20px;
        }

        .registration-form .create-account {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #5791ff;
            border: none;
            color: white;
            margin-top: 20px;
        }

        .registration-form .social-media {
            max-width: 600px;
            background-color: #fff;
            margin: auto;
            padding: 35px 0;
            text-align: center;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            color: #9fadca;
            border-top: 1px solid #dee9ff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .social-icons {
            margin-top: 30px;
            margin-bottom: 16px;
        }

        .registration-form .social-icons a {
            font-size: 23px;
            margin: 0 3px;
            color: #5691ff;
            border: 1px solid;
            border-radius: 50%;
            width: 45px;
            display: inline-block;
            height: 45px;
            text-align: center;
            background-color: #fff;
            line-height: 45px;
        }

        .registration-form .social-icons a:hover {
            text-decoration: none;
            opacity: 0.6;
        }

        @media (max-width: 576px) {
            .registration-form form {
                padding: 50px 20px;
            }

            .registration-form .form-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
                line-height: 70px;
            }
        }
    </style>
</head>

<body>



    <div class="registration-form">
        <form method="POST" action="{{ route('daftar') }}">
            @csrf
            <div class="form-icon">
                <span><i class="fa fa-user"></i></span>
            </div>
            <hr style="background-color:rgb(42, 116, 255)">
            <h1 style="text-align: center;color:rgb(42, 116, 255)">Daftar Akun
            </h1>
            <hr style="background-color:rgb(42, 116, 255)">
            @if (session('message'))
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session('message') }}
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" class="form-control item" name="username" id="username"
                            placeholder="Username" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="password" class="form-control item" name="password" id="password"
                            placeholder="Password" required>
                    </div>
                </div>

                <div class="col-8">
                    <div class="form-group">
                        <input type="text" class="form-control item" name="nik" id="nik" placeholder="Nik" required>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <button id="periksa" class="btn btn-md btn-primary">Periksa Data</button>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control item" name="nama" id="nama" placeholder="Nama" required>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control item" name="no_hp" id="no_hp" placeholder="No Hp"
                            required>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control item" name="alamat" id="alamat" placeholder="Alamat"
                            required>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Daftar</button>
                <span>Sudah punya akun? <a href="{{ route('masuk_form') }}">Masuk</a></span>
            </div>
        </form>
        <div class="social-media">
            {{-- <h5>Sign up with social media</h5>
            <div class="social-icons">
                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a> --}}
            </div>
        </div>
    </div>

    <!-- /.login-box -->

    <!-- jQuery -->

    <script src="{{ url('') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('') }}/dist/js/adminlte.min.js"></script>
    <script src="{{ url('') }}/dist/js/jquery.form.min.js"></script>

    <script>
        $('#periksa').on('click', function(e) {
        e.preventDefault()
         let nik = $("#nik").val()
        //  console.log(nik)

        $.ajax({
        url: "{{ url('') }}/periksa",
        method:"POST",
        data: {nik:nik,_token:'{{ csrf_token() }}'},
        success: function (results) {
        if (results[0] === true) {


        console.log(results['bio'][0].nama)
        $("#nama").val(results['bio'][0].nama)
        $("#no_hp").val(results['bio'][0].no_hp)
        $("#alamat").val(results['bio'][0].alamat)
        $('#nama').prop("readonly", false);
        $('#no_hp').prop("readonly", false);
        $('#alamat').prop("readonly", false);

        }
        else if (results === 'kosong') {
        alert("Data Tidak DItemukan, Silahkan Isi Biodata Anda");
        $("#nama").val('')
        $("#no_hp").val('')
        $("#alamat").val('')
        // $('#nama').prop("readonly", false);
        // $('#no_hp').prop("readonly", false);
        // $('#alamat').prop("readonly", false);
        }
        }
        });

       })
    </script>
</body>

</html>
