@extends('layouts.base')

@section('title', 'Kinerja Rantai Pasok')
@section('pageName', 'Kinerja Rantai Pasok')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <img src="{{ asset('img/metrik-rantai.png') }}" alt="" width="800px">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-6" style="background-color: #D9D9D9">
            <p>
                Berikut merupakan metrik kinerja rantai pasok berdasarkan model Supply Chain Operations Reference (SCOR) yang disesuaikan dengan kondisi perusahaan serta nilai bobot berdasarkan hasil penilaian pakar praktisi.
            </p>
            <p>
                Nilai bobot menunjukkan tingkat kepentingan dari setiap elemen rantai pasok.
            </p>
        </div>
        <div class="col-6 d-flex align-items-end">
            <a href="{{ route('formRantai') }}" class="btn btn-yellow-custom" style="font-size: 25px">
                <i class="fa-solid fa-chart-line"></i>
                Ukur Nilai Kinerja Rantai Pasok
            </a>
        </div>
    </div>
</div>
@endsection