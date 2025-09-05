<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('notif'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('notif') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <a href="tambah-produk" class="btn btn-warning">Tambah Produk</a>
    <table class="mt-3 table table-striped table-bordered">
        <tr class="fw-bold text-center">
            <td>No</td>
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Aksi</td>
        </tr>
        @forelse ($data as $isi)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->NamaProduk }}</td>
                <td>{{ $isi->Harga }}</td>
                <td>{{ $isi->Stok }}
                    {{-- @if ($isi->Stok == 0)
                        <b>stok habis</b>
                    @else
                        {{ $isi->Stok }}
                    @endif --}}
                </td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="/edit-produk/{{ $isi->id }}" class="btn btn-info">Edit</a>
                        <form action="/produk/{{ $isi->id }}/hapus" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-warning">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Data Tidak Ada</td>
            </tr>
        @endforelse
    </table>
</x-layout>