@extends('layouts.base')

@section('title', 'History Persediaan')
@section('pageName', 'History Persediaan')

@section('content')
<div class="container">
    <table class="my-4 table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Persediaan (Pack)</th>
                <th>Minimal Persediaan (Pack)</th>
                <th>User</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventories as $inventory)
            <tr>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
