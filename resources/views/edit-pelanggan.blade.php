<x:layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="/pelanggan/{{ $data->id }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Nama Pelanggan</label>
            <input type="text" class="form-control" name="Nama" required value="{{ $data->NamaPelanggan }}">
            @error('Nama')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="email">Alamat</label>
            <input type="text" class="form-control" name="Alamat" required value="{{ $data->Alamat }}">
            @error('Alamat')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="pw">Nomor Telepon</label>
            <input type="text" class="form-control" name="NoTelp" required value="{{ $data->NoTelp }}">
            @error('NoTelp')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </form>
</x:layout>