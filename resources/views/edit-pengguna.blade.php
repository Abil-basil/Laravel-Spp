<x:layout>
    <x-slot:title>{{ $title }}</x-slot:title>

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
            <label for="pw">Password</label>
            <input type="password" class="form-control" name="password" required placeholder="Masukan Kemabli Password">
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