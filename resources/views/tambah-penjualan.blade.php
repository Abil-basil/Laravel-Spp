<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- @dd($produk) --}}

    @if (session()->has('warning'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <div class="card-body">
        <form action="/penjualan" method="POST" id="form-input">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="kasir">kasir</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                    <input type="hidden" name="penggunaId" value="{{ Auth::user()->id }}">
                </div>
                <div class="col-md-6">
                    <label for="pembeli">pembeli</label>
                    <select name="pelangganId" id="pembeli" class="form-control">
                        <option value="">pilih pelanggan</option>
                        @foreach ($pelanggan as $item)
                        <option value="{{ $item->id }}">{{ $item->NamaPelanggan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="produk">produk</label>
                    <select name="produkId" id="produk" class="form-control">
                        <option value="">pilih produk</option>
                        @foreach ($produk as $item)
                        <option value="{{ $item->id }}">{{ $item->NamaProduk }} -- {{ $item->Harga }} -- stok {{ $item->Stok }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="jumlah">jumlah</label>
                    <input type="number" class="form-control" name="jumlah" placeholder="Masukan Jumlah" required>
                </div>
            </div>
                <button type="submit" class="btn btn-success add-list">tambah item</button>
        </form>
    </div>
    <div class="card-body">
        <form action="/penjualan" method="POST">
            @csrf
            <table class="table table-stripped table-sm">
                <tr class="text-center">
                    <th colspan="6">List Item</th>
                </tr>
            </table>
            <div class="row mb-3">
                <button type="submit" class="btn btn-success">kirim</button>
            </div>
        </form>
    </div>
</x-layout>