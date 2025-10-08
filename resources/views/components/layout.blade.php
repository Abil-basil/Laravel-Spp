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
            selamat datang <b>{{ Auth::user()->name }}</b> sebagai <b>{{ Auth::user()->peran }}</b>
        </div>
        @if (Auth::user()->peran == 'petugas')
            <a href="/produk" class="btn btn-warning">produk</a>
            <a href="/penjualan" class="btn btn-warning">penjualan</a>
        @else
            <a href="/pengguna" class="btn btn-warning">pengguna</a>
            <a href="/pelanggan" class="btn btn-warning">pelanggan</a>
            <a href="/produk" class="btn btn-warning">produk</a>
            <a href="/penjualan" class="btn btn-warning">penjualan</a>
        @endif
        <form action="/logout" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger">logout</button>
        </form>

        <div class="card mt-2">
            <div class="card-body">
                <h4>{{ $title }}</h4>
                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="{{ asset('javascript/javascript.js') }}"></script>
</body>
</html>