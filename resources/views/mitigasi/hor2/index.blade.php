@extends('layouts.mitigasi')

@section('link')
<a href="#" type="button" class="btn btn-outline-secondary">HOR 1</a>
<a href="#" type="button" class="btn btn-yellow-custom">HOR 2</a>
@endsection

@section('contentMitigasi')
<form action="{{ route('mitigasi.create2') }}" method="POST">
    @csrf
    <input type="hidden" name="type" value="HOR2">
    <input type="hidden" name="id_record" value="{{ $id_record }}">
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
            <h5 class="fw-semibold">Prioritas sumber risiko!</h5>
        </div>
        <div class="row">
            <div class="col-1 text-center">
                <h4>Code</h4>
            </div>
            <div class="col-5 text-center">
                <h4>Sumber risiko</h4>
            </div>
            <div class="col-1 text-center">
                <h4>Arp</h4>
            </div>
            <div class="col-2 text-center">
                <h4>Sum ARP</h4>
            </div>
            <div class="col-2 text-center">
                <h4>ARP kum</h4>
            </div>
            <div class="col-1 text-center">
                <h4>Peringkat</h4>
            </div>
        </div>
        @foreach($mitigationResult as $key => $record)
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control text-center {{ $record->cumulative < 80 ? "bg-warning-custom" : "" }}" readonly value="{{ $record->mitigation_headers->code }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control {{ $record->cumulative < 80 ? "bg-warning-custom" : "" }}" readonly value="{{ $record->mitigation_headers->description }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3 justify-content-center">
                            <input type="text" class="form-control {{ $record->cumulative < 80 ? "bg-warning-custom" : "" }}" readonly value="{{ $record->value }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <div class="input-group mb-3 justify-content-center">
                            <input type="text" class="form-control {{ $record->cumulative < 80 ? "bg-warning-custom" : "" }}" readonly value="{{ $record->sum }}"/>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <div class="input-group mb-3 justify-content-center">
                            <input type="text" class="form-control {{ $record->cumulative < 80 ? "bg-warning-custom" : "" }}" readonly value="{{ $record->cumulative }}%"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3 justify-content-center">
                            <input type="text" class="form-control {{ $record->cumulative < 80 ? "bg-warning-custom" : "" }}" readonly value="{{ $record->rank }}"/>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
        <div id="risk-mitigation-form">
            <div class="row">
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="hidden" name="category_id[]" class="risk-events" value="3">
                            <input type="text" class="form-control risk-mitigation text-center" value="PA1" readonly name="code[]"/>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control risk-mitigation" placeholder="+ Tambahkan mitigasi risiko" name="description[]"/>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control risk-mitigation text-center max-5" placeholder="" name="value[]"/>
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
        let counter = 2;
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
                                    <input type="hidden" name="category_id[]" class="risk-events" value="3">
                                    <input type="text" class="form-control risk-mitigation text-center" value="PA${counter}" readonly name="code[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control risk-mitigation" placeholder="+ Tambahkan mitigasi risiko" name="description[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control risk-mitigation text-center max-5" placeholder="" name="value[]"/>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                counter++;
                $(this).closest('#risk-mitigation-form').append(newRow);
            }
        });

        $(document).on('change', '.max-5', function() {
            if ($(this).val() > 5) {
                $(this).val(5);
            }
        });

        $(function() {
            
        });
    </script>
@endsection
