@extends('layouts.base')

@section('title', 'Kinerja Rantai Pasok')
@section('pageName', 'Kinerja Rantai Pasok')

@section('content')
<div class="container">
    <table class="my-4 table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Total Kinerja (%)</th>
                <th>Status Kinerja</th>
                <th>User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($performances as $performance)
            <tr>
                <td>{{ $performance->updated_at }}</td>
                <td>{{ $performance->total }}</td>
                <td>{{ $performance->status }}</td>
                <td>{{ $performance->user->name }}</td>
                <td>
                    <a href="{{ route('editRantai', $performance->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('deleteRantai', $performance->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            {{-- <tr>
                <td>{{ $inventory->updated_at }}</td>
                <td>{{ $inventory->durian_quantity }}</td>
                <td>{{ $inventory->minimum_stock }}</td>
                <td>{{ $inventory->user->name }}</td>
                <td>
                    <a href="{{ route('editPersediaan', $inventory->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('deletePersediaan', $inventory->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr> --}}
            @endforeach
        </tbody>
    </table>
</div>
@endsection
