@extends('layouts.mitigasi')

@section('link')
<a href="#" type="button" class="btn btn-yellow-custom">HOR 1</a>
<a href="#" type="button" class="btn btn-outline-secondary">HOR 2</a>
@endsection

@section('contentMitigasi')
    <div>
        <div class="row mt-5 mb-3">
            <h5 class="fw-semibold">Prioritas sumber risiko!</h5>
        </div>
        <div>
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
            <div class="row mb-5">
                <div class="col">
                    <div class="form-group mt-4">
                        <a href="{{ route('mitigasi.pdf', ['id_record' => $id_record, 'id_category' => 2]) }}" class="btn btn-yellow-custom">
                            Save PDF
                            <i class="fa-solid fa-arrow-down-long"></i>
                        </a>
                    </div>
                </div>
                <div class="col text-end">
                    <div class="form-group mt-4">
                        <a href="{{ route('hor2Mitigasi', $id_record) }}" class="btn btn-yellow-custom">
                            Selanjutnya
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection