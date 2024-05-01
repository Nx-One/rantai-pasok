@extends('layouts.base')

@section('title', 'History Persediaan')
@section('pageName', 'History Persediaan')

@section('content')
<div class="container">
    <table class="my-4 table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Persediaan (Pack)</th>
                <th>Minimal Persediaan (Pack)</th>
                <th>User</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>11-10-2021</td>
                <td>115</td>
                <td>10</td>
                <td>Irwan</td>
            </tr>
            <tr>
                <td>11-10-2021</td>
                <td>115</td>
                <td>10</td>
                <td>Irwan</td>
            </tr>
            <tr>
                <td>11-10-2021</td>
                <td>115</td>
                <td>10</td>
                <td>Irwan</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
