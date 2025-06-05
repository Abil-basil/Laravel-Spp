<x-layout-login>
    <x-slot:keterangan>{{ $keterangan }}</x-slot:keterangan>

    <form action="/daftar" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="username">Username  </label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukan Username anda.." value="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="email">email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan email anda.." required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password anda.." required">
            @error ('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="peran">Role</label>
            <select name="peran" id="peran" class="form-control @error('peran') is-invalid @enderror">
                <option value="">pilih role</option>
                <option value="admin">admin</option>
                <option value="petugas">petugas</option>
            </select>
            @error('peran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">
                DAFTAR
            </button>
        </div>
    </form>

</x-layout-login>