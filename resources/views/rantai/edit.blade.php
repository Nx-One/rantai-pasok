@extends('layouts.base')

@section('title', 'Kinerja Rantai Pasok')
@section('pageName', 'Kinerja Rantai Pasok')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/rantai/style.css') }}">
@endsection

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
        <form method="POST" action="{{ route('updateRantai', $performance->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="background-color: #FFF2AC;" class="col-1 align-middle text-center" rowspan="2">No</th>
                                <th style="background-color: #FFF2AC;" class="col align-middle text-center" rowspan="2">Metrik</th>
                                <th style="background-color: #FFF2AC;" colspan="3" class="col text-center">Nilai Metrik</th>
                            </tr>
                            <tr>
                                <th style="background-color: #FFF2AC;" class="col text-center">Minimum</th>
                                <th style="background-color: #FFF2AC;" class="col text-center">Maksimum</th>
                                <th style="background-color: #FFF2AC;" class="col text-center">Aktual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Jumlah pesanan yang dikirim tepat waktu (ton)</td>
                                <td><input type="text" class="text-center" placeholder="" name="min_orders_shipped" value="{{ $performance->min_orders_shipped }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="max_orders_shipped" value="{{ $performance->max_orders_shipped }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="act_orders_shipped" value="{{ $performance->act_orders_shipped }}" /></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jumlah permintaan yang dipenuhi dengan waktu dan jumlah yang sesuai (ton)</td>
                                <td><input type="text" class="text-center" placeholder="" name="min_requests_fulfilled" value="{{ $performance->min_requests_fulfilled }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="max_requests_fulfilled" value="{{ $performance->max_requests_fulfilled }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="act_requests_fulfilled" value="{{ $performance->act_requests_fulfilled }}" /></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Jumlah pengiriman yang sesuai standar (ton)</td>
                                <td><input type="text" class="text-center" placeholder="" name="min_number_of_shipments" value="{{ $performance->min_number_of_shipments }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="max_number_of_shipments" value="{{ $performance->max_number_of_shipments }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="act_number_of_shipments" value="{{ $performance->act_number_of_shipments }}" /></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Lead time atau waktu yang dibutuhkan sejak pesanan diterima hingga dikirim ke tangan konsumen (hari)</td>
                                <td><input type="text" class="text-center" placeholder="" name="min_lead_time" value="{{ $performance->min_lead_time }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="max_lead_time" value="{{ $performance->max_lead_time }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="act_lead_time" value="{{ $performance->act_lead_time }}" /></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Siklus pemenuhan pesanan atau waktu yang dibutuhkan dari mulai pengadaan bahan baku, proses produksi, hingga pengiriman produk (hari)</td>
                                <td><input type="text" class="text-center" placeholder="" name="min_order_cycles" value="{{ $performance->min_order_cycles }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="max_order_cycles" value="{{ $performance->max_order_cycles }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="act_order_cycles" value="{{ $performance->act_order_cycles }}" /></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Fleksibilitas atau waktu yang dibutuhkan dari mulai perencanaan, pengadaan, proses, pengiriman, hingga produk tiba di tangan konsumen (hari)</td>
                                <td><input type="text" class="text-center" placeholder="" name="min_flexibility" value="{{ $performance->min_flexibility }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="max_flexibility" value="{{ $performance->max_flexibility }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="act_flexibility" value="{{ $performance->act_flexibility }}" /></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Biaya total rantai pasok (Rp/kg)</td>
                                <td><input type="text" class="text-center" placeholder="" name="min_supply_chain_costs" value="{{ $performance->min_supply_chain_costs }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="max_supply_chain_costs" value="{{ $performance->max_supply_chain_costs }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="act_supply_chain_costs" value="{{ $performance->act_supply_chain_costs }}" /></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Harga pokok penjualan (Rp/kg)</td>
                                <td><input type="text" class="text-center" placeholder="" name="min_cogs" value="{{ $performance->min_cogs }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="max_cogs" value="{{ $performance->max_cogs }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="act_cogs" value="{{ $performance->act_cogs }}" /></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Siklus perputaran modal (hari)</td>
                                <td><input type="text" class="text-center" placeholder="" name="min_payback_cycle" value="{{ $performance->min_payback_cycle }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="max_payback_cycle" value="{{ $performance->max_payback_cycle }}" /></td>
                                <td><input type="text" class="text-center" placeholder="" name="act_payback_cycle" value="{{ $performance->act_payback_cycle }}" /></td>
                            </tr>
                        </tbody>
                    </table>
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
            </div>
        </form> 
    </div>
    <div class="row my-4">
        <div class="col-5">
            <h3 class="fw-semibold">Nilai Kinerja Rantai Pasok</h3>
        </div>
        <div class="col-1 bg-yellow-custom d-flex justify-content-evenly align-items-center border rounded">
            <h2 class="fw-semibold">{{ $performance->total }}%</h2>
        </div>
        <div class="col-6">
            <h3>
                Nilai kinerja rantai pasok tersebut
                termasuk pada kategori <span class="fw-semibold">{{ $performance->status }}</span>
            </h3>
        </div>
    </div>
</div>
@endsection