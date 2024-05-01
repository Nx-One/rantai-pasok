@extends('layouts.base')

@section('title', 'Penurunan Mutu')
@section('pageName', 'Penurunan Mutu')

@section('content')
<div class="container">
    <form action="">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label class="fw-bold" for="tanggal">Masukkan Bulan Produksi Durian </label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
            </div>
            <div class="col-md-5">
                <button type="submit" class="btn btn-yellow-custom mt-4">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    Cari
                </button>
            </div>
        </div>
    </form>
</div>
@endsection