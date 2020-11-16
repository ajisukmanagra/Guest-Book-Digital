<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Book Digital | SMK NURUL ISLAM</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .bg-7A78BF {
            background-color: #7A78BF;
        }

        .btn-1F457E {
            background-color: #1F457E;
        }

        .btn-1F457E:hover {
            background-color: blue;
        }

        .image {
            margin-top: 50px;
        }

        .content {
            margin-top: 80px;
        }

        .button {
            background-color: #7EE39A;
            width: 350px;
            border-radius: 50px;
            height: 50px;
            color: white;
        }

        .text-button {
            font-size: 20px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-light bg-7A78BF">
        <span class="navbar-brand mb-0 h1 text-white">
            GUEST BOOK DIGITAL
        </span>

        <button class="float-right btn btn-1F457E">
            <a href="/login" class="text-white" style="text-decoration: none;">MASUK</a>
        </button>
    </nav>

    <center class="mt-5">
        <h2>SELAMAT DATANG DI GUEST BOOK DIGITAL</h2>

        <div class="image">
            <img src="{{ asset('img/logo-smk.png') }}">
            <h2 class="mt-3">SMK NURUL ISLAM</h2>
        </div>

        <div class="content">
            <a href="/tamu_isi_form">
                <button class="btn button">
                    <span class="text-button">ISI DATA TAMU</span>
                </button>
            </a>
        </div>
    </center>


    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>