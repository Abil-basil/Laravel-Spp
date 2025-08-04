<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <a href="tambah-pelanggan" class="btn btn-warning">Tambah Pelanggan</a>
    <table class="mt-3 table table-striped table-bordered">
        <tr class="fw-bold text-center">
            <td>No</td>
            <td>Nama Pelanggan</td>
            <td>Alamat</td>
            <td>Nomor Telepon</td>
        </tr>
        @forelse ($data as $isi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->NamaPelanggan }}</td>
                <td>{{ $isi->Alamat }}</td>
                <td>{{ $isi->NoTelp }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Data Tidak Ada</td>
            </tr>
        @endforelse
    </table>
</x-layout>