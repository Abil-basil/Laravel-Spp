<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <a href=""></a>
    <table class="mt-3 table table-striped table-bordered">
        <tr class="fw-bold text-center">
            <td>No</td>
            <td>Tanggal Penjualan</td>
            <td>Total Harga</td>
            <td>Nama Pengguna</td>
            <td>Nama Pelanggan</td>
            <td>Aksi</td>
        </tr>
        @forelse ($data as $isi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->TanggalPenjualan }}</td>
                <td>{{ $isi->TotalHarga }}</td>
                <td>{{ $isi->Pengguna->name }}</td>
                <td>{{ $isi->Pelanggan->NamaPelanggan }}</td>
                <td>
                    <a href="/detail-penjualan/{{ $isi->id }}" class="btn btn-warning">Detail</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Data Tidak Ada</td>
            </tr>
        @endforelse
    </table>
</x-layout>