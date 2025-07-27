<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <table class="mt-3 table table-striped table-bordered">
        <tr class="fw-bold text-center">
            <td>No</td>
            <td>Username</td>
            <td>Password</td>
            <td>Email</td>
            <td>Peran</td>
        </tr>
        @forelse ($data as $isi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $isi->Username }}</td>
                <td class="text-center"> ******* </td>
                <td>{{ $isi->Email }}</td>
                <td>{{ $isi->Peran }}</td>
            </tr>
        @empty
            
        @endforelse
    </table>
</x-layout>