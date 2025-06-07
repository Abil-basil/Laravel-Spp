<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    
    <div class="container mt-5">
        <h3>Aplikasi Cek Stok</h3>
        <div class="alert alert-info">
            selamat datang <b>{{ $name }}</b> sebagai <b>{{ $role }}</b> di aplikasi cek stok
        </div>

        <a href="/admin" class="btn btn-warning" >Data Produk</a>
        <a href="/pelanggan" class="btn btn-warning" >Data Pelanggan</a>

        {{-- logout --}}
        <form action="/logout" method="post" style="display: inline">
            @csrf
            <button type="submit" class="btn btn-danger">
                Logout
            </button>
        </form>

        <div class="card mt-2">
            <div class="card-body">
                <h4>Selamat datang di aplikasi Cek Stok</h4>
                <hr>
                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>