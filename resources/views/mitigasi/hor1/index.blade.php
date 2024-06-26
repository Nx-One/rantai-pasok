@extends('layouts.mitigasi')

@section('link')
<a href="#" type="button" class="btn btn-yellow-custom">HOR 1</a>
<a href="#" type="button" class="btn btn-outline-secondary">HOR 2</a>
@endsection

@section('contentMitigasi')
<form action="{{ route('mitigasi.create') }}" method="POST">
    @csrf
    <input type="hidden" name="type" value="HOR1">
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
                <h4>Kejadian Risiko</h4>
            </div>
            <div class="col-1 text-center">
                <h4>Severity</h4>
            </div>
        </div>
        <div id="risk-events-form">
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="hidden" name="category_id[]" class="risk-events" value="1">
                            <input type="text" class="form-control risk-events text-center" value="E1" readonly name="code[]"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control risk-events" placeholder="+ Tambah kejadian risiko" name="description[]"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="number" max="10" class="form-control risk-events text-center max-10" placeholder="" name="value[]"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <h4>Occurrence</h4>
            </div>
        </div>
        <div id="risk-source-form">
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="hidden" name="category_id[]" class="risk-events" value="2">
                            <input type="text" class="form-control risk-source text-center" value="A1" readonly name="code[]"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control risk-source" placeholder="+ Tambahkan penyebab risiko" name="description[]"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="number" max="10" class="form-control risk-source text-center max-10" placeholder="" name="value[]"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col text-end">
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-yellow-custom">
                    Selanjutnya
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</form>
    

@endsection

@section('scriptMitigasi')
    <script>
        let counterCodeEvent = 2;
        let counterCodeSource = 2;
        $(document).on('change', '.risk-events', function() {
            var allFilled = true;
            $(this).closest('.row').find('input').slice(-3).each(function() {
                if ($(this).val() === '') {
                    allFilled = false;
                    return false; // break the loop
                }
            });

            if (allFilled) {
                var newRow = `
                    <div class="row">
                        <div class="col-1">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="category_id[]" class="risk-events" value="1">
                                    <input type="text" class="form-control risk-events text-center" value="E${counterCodeEvent}" readonly name="code[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control risk-events" placeholder="+ Tambah kejadian risiko" name="description[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="number" max="10" class="form-control risk-events text-center max-10" placeholder="" name="value[]"/>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                counterCodeEvent++;
                $(this).closest('#risk-events-form').append(newRow);
            }
        });

        $(document).on('change', '.risk-source', function() {
            var allFilled = true;
            $(this).closest('.row').find('input').each(function() {
                if ($(this).val() === '') {
                    allFilled = false;
                    return false; // break the loop
                }
            });

            if (allFilled) {
                var newRow = `
                    <div class="row">
                        <div class="col-1">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="category_id[]" class="risk-events" value="2">
                                    <input type="text" class="form-control risk-source text-center" value="A${counterCodeSource}" readonly name="code[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control risk-source" placeholder="+ Tambah kejadian risiko" name="description[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="number" max="10" class="form-control risk-source text-center max-10" placeholder="" name="value[]"/>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                counterCodeSource++;
                $(this).closest('#risk-source-form').append(newRow);
            }
        });

        $(document).on('change', '.max-10', function() {
            if ($(this).val() > 10) {
                $(this).val(10);
            }
        });
        $(function() {
            
        });
    </script>
@endsection
