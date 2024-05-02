@extends('layouts.mitigasi')

@section('contentMitigasi')
<div class="row my-3 justify-content-center">
    <div class="col-6">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Skala</th>
                    <th scope="col">Derajat Kesulitan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Sangat mudah</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Mudah</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Sedang</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Sulit</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Sangat sulit</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div>
    <div class="row">
        <h5 class="fw-semibold">Identifikasi mitigasi risiko dan nilai derajat kesulitan dengan skala 1-10!</h5>
    </div>
    <div class="row mt-3">
        <div class="col-1 text-center">
            <h4>No</h4>
        </div>
        <div class="col-10 text-center">
            <h4>Mitigasi Risiko</h4>
        </div>
        <div class="col-1 text-center">
            <h4>Dk</h4>
        </div>
    </div>
    <form action="">
        <div class="row">
            <div class="col-1">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control text-center" value="PA1"/>
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
                        <input type="text" class="form-control text-center" value="PA2"/>
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
                        <input type="text" class="form-control text-center" value="PA3"/>
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
                        <input type="text" class="form-control text-center" value="PA4"/>
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
                        <input type="text" class="form-control text-center" value="PA5"/>
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
                        <input type="text" class="form-control text-center" value="PA6"/>
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
                        <input type="text" class="form-control text-center" placeholder="PAn"/>
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
@endsection