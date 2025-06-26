<x-layout-page>
    <x-slot:name>{{ $user->username }}</x-slot:name>
    <x-slot:role>{{ $user->peran }}</x-slot:role>
    <x-slot:title>{{ $title }}</x-slot:title>
    <table class="table table-striped table-bordered">
        <tr class="fw-bold">
            <td>No</td>
            <td>Tanggal Penjualan</td>
            <td>Total Harga</td>
            <td>Nama Kasir</td>
            <td>Nama Pembeli</td>
        </tr>

        @forelse ($penjualans as $penjualan)
            <tr>
                <td>{{ $loop->iteration }}</td> {{-- auto increment --}} 
                <td>{{ $penjualan->TanggalPenjualan }}</td>
                <td>{{ $penjualan->TotalHarga }}</td>
                <td>
                    <a href="/detail-kasir/{{ $penjualan->UserID }}" class="btn btn-link text-decoration-none">{{ $penjualan->pengguna->username }}</a>
                </td>
                <td>
                    <a href="/detail-pelanggan/{{ $penjualan->PelangganID }}" class="btn btn-link text-decoration-none">{{ $penjualan->pelanggan->NamaPelanggan }}</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"><h5>data kosong</h5></td>
            </tr>
        @endforelse
    </table>
</x-layout-page>