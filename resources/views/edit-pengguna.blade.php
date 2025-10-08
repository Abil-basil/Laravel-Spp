<x:layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('warning'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <form action="/pengguna/{{ $data->id }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group mb-3">
            <label for="name">username</label>
            <input type="text" class="form-control" name="name" required value="{{ $data->name }}">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required value="{{ $data->email }}">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="pw">Password (kosongkan jika ingin password tetap)</label>
            <input type="password" class="form-control" name="password"  placeholder="Masukan Password Baru">
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="peran">Peran</label>
            <select name="peran" class="form-control" id="peran">
                <option value="petugas">Petugas</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </form>
</x:layout>