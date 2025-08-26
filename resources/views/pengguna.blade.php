<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session()->has('notif'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('notif') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif

    <a href="tambah-pengguna" class="btn btn-warning">Tambah Pengguna</a>
    <table class="mt-3 table table-striped table-bordered">
        <tr class="fw-bold text-center">
            <td>No</td>
            <td>Username</td>
            <td>Password</td>
            <td>Email</td>
            <td>Peran</td>
            <td>Aksi</td>
        </tr>
        @forelse ($data as $isi)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->name }}</td>
                <td class="text-center"> ******* </td>
                <td>{{ $isi->email }}</td>
                <td>{{ $isi->peran }}</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="/edit-pengguna/{{ $isi->id }}" class="btn btn-info">Edit</a> 
                        <form action="/pengguna/{{ $isi->id }}/hapus" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus pengguna {{ $isi->name }}')">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Data Tidak Ada</td>
            </tr>
        @endforelse
    </table>
</x-layout>