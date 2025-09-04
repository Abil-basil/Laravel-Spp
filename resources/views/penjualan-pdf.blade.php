<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penjualan Pdf</title>
</head>
<body>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr style="background-color: red">
            <th>No</th>
            <th>Tanggal Penjualan</th>
            <th>Total Harga</th>
            <th>Nama Pengguna</th>
            <th>Nama Pelanggan</th>
        </tr>
        @foreach ($data as $isi)
            <tr style="background-color: aquamarine">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->TanggalPenjualan }}</td>
                <td>{{ $isi->TotalHarga }}</td>
                <td>{{ $isi->Pengguna->name }}</td>
                <td>{{ $isi->Pelanggan->NamaPelanggan }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>