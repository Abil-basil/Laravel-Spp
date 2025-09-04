<x-layout-login>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('notif'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('notif') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Masukan Email ..." required value="{{ old('email') }}">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="pw">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Masukan Password ..." required>
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="from-group mb-2">
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </div>
    </form>
    <a href="register" class="text-decoration-none">belum punya akun?</a>

</x-layout-login>