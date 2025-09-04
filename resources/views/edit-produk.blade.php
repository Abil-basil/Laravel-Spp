<x:layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="/produk/{{ $data->id }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Nama Produk</label>
            <input type="text" class="form-control" name="NamaProduk" required value="{{ $data->NamaProduk }}">
            @error('NamaProduk')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="email">Harga</label>
            <input type="text" class="form-control" name="Harga" required value="{{ $data->Harga }}">
            @error('Harga')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="pw">Stok</label>
            <input type="text" class="form-control" name="Stok" required value="{{ $data->Stok }}">
            @error('Stok')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </form>
</x:layout>