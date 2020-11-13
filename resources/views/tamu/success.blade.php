<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Pengajuan Berhasil!</title>
</head>

<body>

    <div class="container">
        <div class="p-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="text-success">PENGAJUAN ANDA BERHASIL!</h3>
                        </div>
                        <div class="col-6">
                            <img src="{{ asset('img/logo-smk.png') }}" class="float-right" width="50px">
                        </div>
                    </div>
                    <hr>
                    <center>
                        <img src="{{ asset('img/success_form.jpg') }}" width="90%">
                    </center>
                    <p class="float-right">Akan dialihkan ke halaman awal dalam 5 detik</p>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        setTimeout(function() {
            window.location.href = '/tamu_isi_form';
        }, 5000);
    </script>
</body>

</html>