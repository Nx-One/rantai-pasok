@extends('layouts.base')

@section('title', 'Mitigasi Risiko')
@section('pageName', 'Mitigasi Risiko')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h5 class="fw-semibold">Daftar Mitigasi</h5>
            <a href="{{ route('hor1Mitigasi') }}" class="btn btn-yellow-custom mt-3">Tambah Mitigasi</a>
        </div>
    </div>
    <table class="my-4 table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mitigationRecords as $mitigasiRecord)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mitigasiRecord->name }}</td>
                <td>{{ $mitigasiRecord->updated_at }}</td>
                <td>
                    <a href="{{ route('mitigasi.edit', $mitigasiRecord->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('mitigasi.show', $mitigasiRecord->id) }}" class="btn btn-secondary">Show</a>
                </td>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
