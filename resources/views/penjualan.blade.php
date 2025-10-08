<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('notif'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('notif') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    @if (session()->has('warning'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex">
            <a href="/tambah-penjualan" class="btn btn-warning">Tambah Penjualan</a>
            <form class="d-flex">
                <select name="sort" class="form-control bg-secondary text-white">
                    <option value="">Pilih Berdasarkan</option>
                    <option value="desc">Terbaru</option>
                    <option value="asc">Terlama</option>
                </select>
                <button type="submit" class="btn btn-secondary">Urutkan</button>
            </form>
        </div>
        <a href="/penjualan/download-pdf" class="btn btn-info">Download PDF</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="fw-bold text-center">
                        <th>No</th>
                        <th>Tanggal Penjualan</th>
                        <th>Total Harga</th>
                        <th>Nama Pengguna</th>
                        <th>Nama Pelanggan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $isi)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($isi->TanggalPenjualan)->format('d/m/Y H:i') }} |
                                {{ $isi->created_at->diffForHumans() }}
                            </td>
                            <td>Rp {{ number_format($isi->TotalHarga, 0, ',', '.') }}</td>
                            <td>{{ $isi->Pengguna->name }}</td>
                            <td>{{ $isi->Pelanggan->NamaPelanggan }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="/detail-penjualan/{{ $isi->id }}" class="btn btn-sm btn-warning">Detail</a>
                                    <form action="/penjualan/{{ $isi->id }}/hapus" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus penjualan ini? Stok produk akan dikembalikan.')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Data Tidak Ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>