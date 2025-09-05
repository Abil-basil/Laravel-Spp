{{-- halaman untuk detail penjualan dan detail produk --}}
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- pengecekan apakh ada $penjualan --}}
    @if (isset($penjualan))
        {{-- Header Informasi Penjualan --}}
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong>Informasi Penjualan</strong></h6>
                        <p><strong>Tanggal Penjualan:</strong>{{ $penjualan->TanggalPenjualan }}</p>
                        <p><strong>Total Harga:</strong> {{ number_format($penjualan->TotalHarga, 0, ',', '.') }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Kasir:</strong>{{ $penjualan->pengguna->name }}</p>
                        <p><strong>Pembeli:</strong>{{ $penjualan->pelanggan->NamaPelanggan }}</p>
                    </div>
                </div>
            </div>
        </div>

        <a href="/penjualan" class="btn btn-secondary mb-3">Kembali Ke Penjualan</a>
    @endif

    <table class="mt-3 table table-striped table-bordered">
        <tr class="fw-bold text-center">
            <td>No</td>
            <td>Nama Produk</td>
            <td>Jumlah Produk</td>
            <td>Harga Satuan</td>
            <td>Subtotal</td>
            {{-- cek apakah $penjualan tidak ada jika ya code ini akan di tampilkan --}}
            @if (!isset($penjualan))
                <td>Tanggal Penjualan</td>
            @endif
        </tr>

        {{-- looping perulangan --}}
        @php
            // cek apakah ada $details jika ada $dataLoop akan di isi $details jika tidak ada $details cek apakah ada $isi jika tidak ada $dataLopp akan di isi array kosong
          $dataLoop = isset($details) ? $details : (isset($isi) ? $isi : []);   
        @endphp

        @forelse ($dataLoop as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="/detail-produk/{{ $data->ProdukID }}" class="text-decoration-none">{{ $data->produk->NamaProduk }}</a>
                </td>
                <td>{{ $data->JumlahProduk }}</td>
                <td>Rp {{ number_format($data->Subtotal / $data->JumlahProduk, 0, ',', '.') }}</td>
                <td>{{ number_format($data->Subtotal, 0, ',', '.') }}</td>
                {{-- cek apakah $penjualan tidak ada jika ya code ini akan di tampilkan --}}
                @if (!isset($penjualan))
                    <td>
                        <a href="/penjualan/{{ $data->PenjualanID }}" class="text-decoration-none">{{ $data->penjualan->TanggalPenjualan }}</a>
                    </td>
                @endif
            </tr>
        @empty
            <tr>
                {{-- cek apakah ada $penjualan jika ada colspan akan bernilai 5 --}}
                <td colspan="{{ isset($penjualan) ? '5' : '6' }}" class="text-center">Data Tidak Ada</td>
            </tr>
        @endforelse
    </table>
</x-layout>