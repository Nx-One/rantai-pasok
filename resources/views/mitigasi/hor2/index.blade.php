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
        <form action="" id="risk-mitigation-form">
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control risk-mitigation text-center" placeholder="PAn"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control risk-mitigation" placeholder="+ Tambahkan mitigasi risiko"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control risk-mitigation text-center" placeholder=""/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row mb-5">
        <div class="col text-end">
            <div class="form-group mt-4">
                <a href="{{ route('hor2Connection') }}" class="btn btn-yellow-custom">
                    Selanjutnya
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

@endsection

@section('scriptMitigasi')
    <script>
        $(document).on('change', '.risk-mitigation', function() {
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
                                    <input type="text" class="form-control risk-mitigation text-center" placeholder="PAn"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control risk-mitigation" placeholder="+ Tambahkan mitigasi risiko"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control risk-mitigation text-center" placeholder=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $(this).closest('form#risk-mitigation-form').append(newRow);
            }
        });

        $(function() {
            
        });
    </script>
@endsection
