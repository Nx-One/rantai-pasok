@extends('layouts.base')

@section('title', 'Mitigasi Risiko')
@section('pageName', 'Mitigasi Risiko')

@section('content')
<div class="container">
    <div class="my-3">
        <a href="#" type="button" class="btn btn-yellow-custom">HOR 1</a>
        <a href="{{ route('horMitigasi') }}" type="button" class="btn btn-outline-secondary">HOR 2</a>
    </div>
    <div class="row my-3 justify-content-center">
        <div class="col-6">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Skala</th>
                        <th scope="col">Severity (Si)</th>
                        <th scope="col">Occurrence (Oi)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tidak ada</td>
                        <td>Hampir tidak pernah</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sangat ringan</td>
                        <td>Pencilan</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Ringan</td>
                        <td>Sangat sedikit</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Minor</td>
                        <td>Sedikit</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Sedang</td>
                        <td>Rendah</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Signifikan</td>
                        <td>Sedang</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Major</td>
                        <td>Cukup tinggi</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Ekstrim</td>
                        <td>Tinggi</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Serius</td>
                        <td>Sangat Tinggi</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Berbahaya</td>
                        <td>Hampir selalu terjadi</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <div class="row">
            <h5 class="fw-semibold">Identifikasi kejadian risiko dan nilai severity dengan skala 1-10!</h5>
        </div>
        <div class="row mt-3">
            <div class="col-1 text-center">
                <h4>No</h4>
            </div>
            <div class="col-10 text-center">
                <h4>Kejadian Resiko</h4>
            </div>
            <div class="col-1 text-center">
                <h4>Severity</h4>
            </div>
        </div>
        <form action="">
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="E1"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="E2"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="E3"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="E4"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="E5"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="E6"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" placeholder="En"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" placeholder="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div>
        <div class="row">
            <h5 class="fw-semibold">Identifikasi sumber risiko dan nilai occurance dengan skala 1-10!</h5>
        </div>
        <div class="row mt-3">
            <div class="col-1 text-center">
                <h4>No</h4>
            </div>
            <div class="col-10 text-center">
                <h4>Sumber Risiko</h4>
            </div>
            <div class="col-1 text-center">
                <h4>Occurance</h4>
            </div>
        </div>
        <form action="">
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="A1"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="A2"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="A3"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="A4"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="A5"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="A6"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" value="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" value="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" placeholder="An"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Lorem Ipsum"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center" placeholder="Lorem"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
</div>
@endsection