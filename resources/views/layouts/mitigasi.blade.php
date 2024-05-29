@extends('layouts.base')

@section('title', 'Mitigasi Risiko')
@section('pageName', 'Mitigasi Risiko')

@section('content')
<div class="container">
    <div class="my-3">
        <a href="{{ route('hor1Mitigasi') }}" type="button" class="btn {{ (request()->routeIs('hor1Mitigasi')) ? 'btn-yellow-custom' : 'btn-outline-secondary' }}">HOR 1</a>
        <a href="{{ route('hor2Mitigasi') }}" type="button" class="btn {{ (request()->routeIs('hor2Mitigasi')) ? 'btn-yellow-custom' : 'btn-outline-secondary' }}">HOR 2</a>
    </div>
    @yield('contentMitigasi')
</div>
@endsection

@section('scripts')
    @yield('scriptMitigasi')
@endsection