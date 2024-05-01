@extends('layouts.base')

@section('title', 'Kinerja Rantai Pasok')
@section('pageName', 'Kinerja Rantai Pasok')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-4 rounded" style="background-color: #D9D9D9">
            <p>
                Pengukuran nilai kinerja rantai pasok ini menggunakan model Supply Chain Operations Reference (SCOR) yang disesuaikan dengan proses bisnis perusahaan. Isilah setiap penilaian.
            </p>
        </div>
    </div>
    <div class="row">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah pesanan yang dikirim tepat waktu </label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">dari total jumlah pesanan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah permintaan yang dipenuhi dengan waktu dan jumlah yang sesuai</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">dari total jumlah permintaan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah pengiriman yang sesuai standar</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">dari total pengiriman</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Lead time</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Siklus pemenuhan pesanan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Siklus balik modal</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fleksibilitas</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control"/>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya total rantai pasok</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga pokok penjualan (HPP)</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-end">
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-yellow-custom">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            Hitung Nilai Kinerja
                        </button>
                    </div>
                </div>
            </div>
        </form> 
    </div>
    <div class="row my-4">
        <div class="col-5">
            <h3 class="fw-semibold">Nilai Kinerja Rantai Pasok</h3>
        </div>
        <div class="col-1 bg-yellow-custom d-flex justify-content-evenly align-items-center border rounded">
            <h2 class="fw-semibold">90%</h2>
        </div>
        <div class="col-6">
            <h3>
                Nilai kinerja rantai pasok tersebut
                termasuk pada kategori <span class="fw-semibold">Baik</span>
            </h3>
        </div>
    </div>
</div>
@endsection