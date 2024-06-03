@extends('layouts.base')

@section('title', 'Persediaan')
@section('pageName', 'Persediaan')

@section('content')
<div class="container">
    <div class="row">
        <form method="POST" action="{{ route('updatePersediaan', $persediaan->id) }}">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="order_cost">Biaya pesan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="order_cost" id="order_cost" value="{{ $persediaan->order_cost }}"/>
                            <span class="input-group-text">Rp/Kontainer</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="store_cost">Holding Cost</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="store_cost" id="store_cost" value="{{ $persediaan->store_cost }}"/>
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Harga jual produk</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="price" id="price" value="{{ $persediaan->price }}"/>
                            <span class="input-group-text">Rp/Unit</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="demand">Jumlah Permintaan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="demand" id="demand" value="{{ $persediaan->demand }}"/>
                            <span class="input-group-text">Kontainer/Tahun</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="deviation">Nilai standar deviasi</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="deviation" id="deviation" value="{{ $persediaan->deviation }}"/>
                            <span class="input-group-text">/bulan</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-yellow-custom">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    Hitung EOQ dan Safety Stock
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <h5 class="fw-semibold">Economic Order Quantity (EOQ):</h5>
        </div>
        <div class="col-3">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" readonly name="eoq" value="{{ $persediaan->eoq }}"/>
                    <span class="input-group-text">Kontainer/Tahun</span>
                </div>
            </div>
        </div>
        <div class="col-5">
            <p class="text-muted">Perusahaan sebaiknya melakukan <u class="text-secondary">{{ $persediaan->durian_quantity }} kali pengiriman/tahun</u> dengan jumlah pesanan <u class="text-secondary">{{ $persediaan->eoq }} kontainer/pengiriman</u></p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <h5 class="fw-semibold">Safety Stock :</h5>
        </div>
        <div class="col-3">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" readonly name="safety_stock" value="{{ $persediaan->safety_stock }}"/>
                    <span class="input-group-text">Pack</span>
                </div>
            </div>
        </div>
        <div class="col-5">
            <p>Untuk mengatasi permintaan yang probablistik, jumlah safety stock yang harus dimiliki yaitu sebanyak <u class="text-secondary">{{ $persediaan->safety_stock }} unit</u></p>
        </div>
    </div>
</div>
@endsection