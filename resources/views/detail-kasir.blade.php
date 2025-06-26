<x-layout-page>
    {{-- @dd($data) --}}
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

        @forelse ($data as $penjualan)
        {{-- @dd($penjualan) --}}
            <tr>
                <td>{{ $loop->iteration }}</td> {{-- auto increment --}} 
                <td>{{ $penjualan->TanggalPenjualan }}</td>
                <td>{{ $penjualan->TotalHarga }}</td>
                <td>{{ $penjualan->pengguna->username }}</td>
                <td>{{ $penjualan->pelanggan->NamaPelanggan }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"><h5>data kosong</h5></td>
            </tr>
        @endforelse
    </table>
</x-layout-page>