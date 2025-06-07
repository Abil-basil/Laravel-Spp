<x-layout-page>
    <x-slot:name>{{ $user->username }}</x-slot:name>
    <x-slot:role>{{ $user->peran }}</x-slot:role>
    <table class="table table-striped table-bordered">
        <tr class="fw-bold">
            <td>No</td>
            <td>Nama Pelanggan</td>
            <td>Alamat</td>
            <td>No Telepon</td>
        </tr>

        @forelse ($pelanggan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td> {{-- auto increment --}} 
                <td>{{ $item->nama_pelanggan }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_telepon }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"><h5>data kosong</h5></td>
            </tr>
        @endforelse
    </table>
</x-layout-page>