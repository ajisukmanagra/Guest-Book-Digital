<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN KUNJUNGAN TAMU</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container-fluid">

        <div class="row">
            <div class="col-8">
                <span class="header-text">LAPORAN KUNJUNGAN TAMU</span> <br>
                <small>SMK NURUL ISLAM</small>
            </div>
            <div class="col-4 float-right">
                <img src="{{ public_path('img/logo-smk.png') }}" width="60px" class="float-right">
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-7">
                &nbsp;
            </div>
            <div class="col-5 float-right">
                <span class="float-right">Tanggal dicetak : {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
            </div>
        </div>

        <br><br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" style="width: 20px;">No</th>
                    <th>Tanggal</th>
                    <th>Total Tamu</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach($tamu as $k)
                <tr>
                    <td class="text-center">{{ $i ++ }}</td>
                    <td>{{ \Carbon\Carbon::parse($k->tanggal)->translatedFormat('d F Y') }}</td>
                    <td>{{ $k->total_tamu }} Tamu</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>

</html>