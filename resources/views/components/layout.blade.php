<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h3>Aplikasi Kasir</h3>
        <div class="alert alert-info">
            selamat datang <b>ahay</b> sebagai <b>admin</b>
        </div>

        <a href="" class="btn btn-warning">pengguna</a>
        <a href="" class="btn btn-warning">pelanggan</a>
        <a href="" class="btn btn-warning">produk</a>
        <a href="" class="btn btn-warning">penjualan</a>
        <a href="" class="btn btn-warning">detail penjualan</a>

        <div class="card mt-2">
            <div class="card-body">
                <h4>{{ $title }}</h4>
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>