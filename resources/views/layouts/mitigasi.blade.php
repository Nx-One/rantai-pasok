@extends('layouts.base')

@section('title', 'Mitigasi Risiko')
@section('pageName', 'Mitigasi Risiko')

@section('content')
<div class="container">
    <div class="my-3">
        <a href="{{ route('hor1Mitigasi') }}" type="button" class="btn btn-yellow-custom">HOR 1</a>
        <a href="{{ route('hor2Mitigasi') }}" type="button" class="btn btn-outline-secondary">HOR 2</a>
    </div>
    @yield('contentMitigasi')
</div>
@endsection