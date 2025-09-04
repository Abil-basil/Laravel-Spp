<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <form action="/pengguna" method="POST">
        @csrf
        <div class="form-group-mb-2">
            <label for="username">Username</label>
            <input type="text" class="form-control" placeholder="Masukan Username" name="name" id="username" required>
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group-mb-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" placeholder="Masukan Password" id="password" name="password">
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group-mb-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="Masukan Email" id="email" name="email">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group-mb-2">
            <label for="peran">Peran</label>
            <select name="peran" id="peran" class="form-control" required>
                <option value="">pilih peran</option>
                <option value="petugas">Petugas</option>
                <option value="admin">Admin</option>
            </select>
            @error('Peran')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Tambah</button>
    </form>
</x-layout>