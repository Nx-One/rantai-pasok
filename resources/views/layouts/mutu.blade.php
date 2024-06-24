@extends('layouts.base')

@section('title', 'Penurunan Mutu')
@section('pageName', 'Penurunan Mutu')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-1 m-0 p-0" style="width: auto">
            <h1 style="font-size: 7rem">!</h1>
        </div>
        <div class="col-4 rounded" style="background-color: #D9D9D9">
            <p>
                Fitur penurunan mutu menggambarkan perubahan kualitas durian monthong selama masa penyimpanan. Nilai yang didapatkan merupakan hasil uji organoleptik dan uji laboraturium.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <a href="{{ route('mutu.index') }}" type="button" class="btn {{ (request()->routeIs('mutu.index')) ? 'btn-yellow-custom' : 'btn-outline-secondary' }}">Kadar Air</a>
        </div>
        <div class="col text-center">
            <a href="{{ route('mutu.asam') }}" type="button" class="btn {{ (request()->routeIs('mutu.asam')) ? 'btn-yellow-custom' : 'btn-outline-secondary' }}">Total Asam</a>
        </div>
        <div class="col text-center">
            <a href="{{ route('mutu.tpt') }}" type="button" class="btn {{ (request()->routeIs('mutu.tpt')) ? 'btn-yellow-custom' : 'btn-outline-secondary' }}">TPT</a>
        </div>
        {{-- <div class="col">
            <a href="{{ route('mutu.rasa') }}" type="button" class="btn {{ (request()->routeIs('mutu.rasa')) ? 'btn-yellow-custom' : 'btn-outline-secondary' }}">Rasa</a>
        </div>
        <div class="col">
            <a href="{{ route('mutu.warna') }}" type="button" class="btn {{ (request()->routeIs('mutu.warna')) ? 'btn-yellow-custom' : 'btn-outline-secondary' }}">Warna</a>
        </div>
        <div class="col">
            <a href="{{ route('mutu.aroma') }}" type="button" class="btn {{ (request()->routeIs('mutu.aroma')) ? 'btn-yellow-custom' : 'btn-outline-secondary' }}">Aroma</a>
        </div> --}}
    </div>
    <div class="row">
        @yield('contentPenurunanMutu')
    </div>
    
    <div class="row my-4">
        <canvas id="myChart"></canvas>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/3.0.1/chartjs-plugin-annotation.min.js" integrity="sha512-Hn1w6YiiFw6p6S2lXv6yKeqTk0PLVzeCwWY9n32beuPjQ5HLcvz5l2QsP+KilEr1ws37rCTw3bZpvfvVIeTh0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scriptsPenurunanMutu')    
@endsection