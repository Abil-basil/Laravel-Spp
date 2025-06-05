<x-layout-login>
    <x-slot:keterangan>{{ $keterangan }}</x-slot:keterangan>
    
    {{-- pengecekan flash message --}}
    @if (session()->has('succes'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('succes') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    {{-- pengecekan apakah data sesuai jika tidak tampilkan pesan failed --}}
    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <form action="login" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukan Email anda.." required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="password">password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukan Password anda.." required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">
                LOGIN
            </button>
        </div>
    </form>
    <a href="daftar">belum punya akun?</a>

</x-layout-login>