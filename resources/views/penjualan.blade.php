<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('notif'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('notif') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <a href="/tambah-penjualan" class="btn btn-warning">tambah penjualan</a>
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
                    <div class="d-flex justify-content-center gap-2">
                        <a href="/detail-penjualan/{{ $isi->id }}" class="btn btn-warning">Detail</a>
                        <form action="/penjualan/{{ $isi->id }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-warning">hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Data Tidak Ada</td>
            </tr>
        @endforelse
    </table>
</x-layout>