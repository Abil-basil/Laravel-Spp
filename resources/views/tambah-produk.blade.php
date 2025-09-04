<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <form action="/produk" method="POST">
        @csrf
        <div class="form-group-mb-2">
            <label for="nama">Nama Produk</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Produk" name="Nama" id="Nama" required>
            @error('Nama')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group-mb-2">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" placeholder="Masukan Harga" id="harga" name="Harga">
            @error('Harga')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group-mb-2">
            <label for="stok">Stok</label>
            <input type="number" class="form-control" placeholder="Masukan Stok" id="stok" name="Stok">
            @error('Stok')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Tambah</button>
    </form>
</x-layout>