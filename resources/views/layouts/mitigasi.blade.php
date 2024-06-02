@extends('layouts.base')

@section('title', 'Mitigasi Risiko')
@section('pageName', 'Mitigasi Risiko')

@section('styles')
<style>
        /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="my-3">
        @yield('link')
        {{-- <a href="{{ route('hor1Mitigasi') }}" type="button" class="btn {{ (request()->is('hor1')) ? 'btn-yellow-custom' : 'btn-outline-secondary' }}">HOR 1</a>
        <a href="@yield('hor2link')" type="button" class="btn {{ (request()->is('hor2')) ? 'btn-yellow-custom' : 'btn-outline-secondary' }}">HOR 2</a> --}}
    </div>
    @yield('contentMitigasi')
</div>
@endsection

@section('scripts')
    @yield('scriptMitigasi')
@endsection