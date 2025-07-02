<x-layout-page>
    {{-- @dd($isi) --}}
    <x-slot:name>{{ $user->username }}</x-slot:name>
    <x-slot:role>{{ $user->peran }}</x-slot:role>
    <x-slot:title>{{ $title }}</x-slot:title>
    <table class="table table-striped table-bordered">
        <tr class="fw-bold">
            <td>No</td>
            <td>Tanggal Penjualan</td>
            <td>Nama Produk</td>
            <td>Jumlah Produk</td>
            <td>Subtotal</td>
        </tr>

        @forelse ($isi as $dt)
            <tr>
                <td>{{ $loop->iteration }}</td> {{-- auto increment --}} 
                <td>
                    <a href="/detail-penjualan/{{ $dt->PenjualanID }}" class="text-decoration-none">
                        {{ $dt->penjualan->TanggalPenjualan }}
                    </a>
                </td>
                <td>
                    <a href="/detail-produk/{{ $dt->ProdukID }}" class="text-decoration-none">
                        {{ $dt->produk->NamaProduk }}
                    </a>
                </td>
                <td>{{ $dt->JumlahProduk }}</td>
                <td>{{ $dt->Subtotal }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"><h5>data kosong</h5></td>
            </tr>
        @endforelse
    </table>
</x-layout-page>