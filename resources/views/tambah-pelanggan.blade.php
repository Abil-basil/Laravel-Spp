<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <form action="/pelanggan" method="POST">
        @csrf
        <div class="form-group-mb-2">
            <label for="nama">Nama Pengguna</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Pelanggan" name="NamaPelanggan" id="nama" required>
            @error('NamaPelanggan')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group-mb-2">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" placeholder="Masukan Alamat" id="alamat" name="Alamat">
            @error('Alamat')
                <div class="form-text text-form">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group-mb-2">
            <label for="no_telepon">No Telepon</label>
            <input type="number" class="form-control" placeholder="Masukan No Telepon" id="no_telepon" name="NoTelp">
            @error('NoTelp')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Tambah</button>
    </form>
</x-layout>