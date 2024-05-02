@extends('layouts.base')

@section('title', 'Home')
@section('pageName', 'Home')

@section('styles')
    <style>
        .min-heigth-217 {
            min-height: 217px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" id="persediaan-icon">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-warehouse" style="font-size: 200px"></i>
                    <h1>Persediaan</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-none" id="persediaan-detail">
            <div class="card">
                <div class="card-header">
                    <h1>
                        <i class="fa-solid fa-warehouse" style="font-size: 2.25rem;"></i> Persediaan
                    </h1>
                </div>
                <div class="card-body min-heigth-217">
                    <p class="fs-4">
                        Fitur “Persediaan” akan membantu perusahaan dalam pengambilan keputusannya untuk mengetahui jumlah persediaan minimum agar mencegah terjadinya kelebihan atau kekurangan stok.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="mutu-icon">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-vial" style="font-size: 200px"></i>
                    <h1>Penurunan Mutu</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-none" id="mutu-detail">
            <div class="card">
                <div class="card-header">
                    <h1>
                        <i class="fa-solid fa-vial" style="font-size: 2.25rem;"></i> Penurunan Mutu
                    </h1>
                </div>
                <div class="card-body min-heigth-217">
                    <p class="fs-4">
                        Fitur “Penurunan Mutu” akan membantu perusahaan melihat kualitas durian monthong dalam beberapa parameter selama beberapa waktu penyimpanan untuk membantu menentukan kualitas durian dalam kurun waktu penyimpanan tertentu. 
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-6" id="rantai-icon">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-chart-line" style="font-size: 200px"></i>
                    <h1>Kinerja Rantai Pasok</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-none" id="rantai-detail">
            <div class="card">
                <div class="card-header">
                    <h1>
                        <i class="fa-solid fa-chart-line" style="font-size: 2.25rem;"></i> Kinerja Rantai Pasok
                    </h1>
                </div>
                <div class="card-body min-heigth-217">
                    <p class="fs-4">
                        Fitur “Kinerja Rantai Pasok” akan membantu perusahaan dalam mengukur nilai kinerja rantai pasok durian terkini untuk pengambilan keputusan strategi peningkatan kinerja rantai pasok.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="mitigasi-icon">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-triangle-exclamation" style="font-size: 200px"></i>
                    <h1>Mitigasi Risiko</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-none" id="mitigasi-detail">
            <div class="card">
                <div class="card-header">
                    <h1>
                        <i class="fa-solid fa-triangle-exclamation" style="font-size: 2.25rem;"></i> Mitigasi Risiko
                    </h1>
                </div>
                <div class="card-body min-heigth-217">
                    <p class="fs-4">
                        Fitur “Mitigasi Risiko” akan membantu perusahaan dalam menentukan prioritas risiko serta aksi mitigasinya yang dapat diterapkan oleh perusahaan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/home/script.js') }}"></script>
@endsection
