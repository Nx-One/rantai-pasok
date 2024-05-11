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
        <form method="POST" action="{{ route('updateRantai', $performance->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah pesanan yang dikirim tepat waktu</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="orders_shipped" value="{{ $performance->orders_shipped }}"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total jumlah pesanan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="target_orders_shipped" value="{{ $performance->target_orders_shipped }}"/>
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
                            <input type="text" class="form-control" name="requests_fulfilled" value="{{ $performance->requests_fulfilled }}"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total jumlah permintaan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="target_requests_fulfilled" value="{{ $performance->target_requests_fulfilled }}"/>
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
                            <input type="text" class="form-control" name="number_of_shipments" value="{{ $performance->number_of_shipments }}"/>
                            <span class="input-group-text">pack</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total pengiriman</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="target_number_of_shipments" value="{{ $performance->target_number_of_shipments }}"/>
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
                            <input type="text" class="form-control" name="lead_time" value="{{ $performance->lead_time }}"/>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Target lead time tercepat</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="target_lead_time" value="{{ $performance->target_lead_time }}"/>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Siklus pemenuhan pesanan</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="order_cycles" value="{{ $performance->order_cycles }}"/>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Target siklus pemenuhan tercepat</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="target_order_cycles" value="{{ $performance->target_order_cycles }}"/>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fleksibilitas</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="flexibility" value="{{ $performance->flexibility }}"/>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Target fleksibilitas tercepat</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="target_flexibility" value="{{ $performance->target_flexibility }}"/>
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
                            <input type="text" class="form-control" name="supply_chain_costs" value="{{ $performance->supply_chain_costs }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Target total biaya terendah</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" name="target_supply_chain_costs" value="{{ $performance->target_supply_chain_costs }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga pokok penjualan (HPP)</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" name="cogs" value="{{ $performance->cogs }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Target HPP terendah</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" name="target_cogs" value="{{ $performance->target_cogs }}"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Siklus balik modal</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="payback_cycle" value="{{ $performance->payback_cycle }}"/>
                            <span class="input-group-text">hari</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Target siklus balik modal tercepat</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="target_payback_cycle" value="{{ $performance->target_payback_cycle }}"/>
                            <span class="input-group-text">hari</span>
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