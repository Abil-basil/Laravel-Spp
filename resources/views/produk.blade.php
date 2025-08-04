<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <a href="tambah-produk" class="btn btn-warning">Tambah Produk</a>
    <table class="mt-3 table table-striped table-bordered">
        <tr class="fw-bold text-center">
            <td>No</td>
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Stok</td>
        </tr>
        @forelse ($data as $isi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->NamaProduk }}</td>
                <td>{{ $isi->Harga }}</td>
                <td>{{ $isi->Stok }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Data Tidak Ada</td>
            </tr>
        @endforelse
    </table>
</x-layout>