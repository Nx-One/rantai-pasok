@extends('layouts.mitigasi')

@section('link')
<a href="#" type="button" class="btn btn-yellow-custom">HOR 1</a>
<a href="#" type="button" class="btn btn-outline-secondary">HOR 2</a>
@endsection

@section('contentMitigasi')
    <div>
        <div class="row">
            <h5 class="fw-semibold">Identifikasi hubungan sumber risiko dan kejadian risiko!</h5>
        </div>
        <div>
            <form action="{{ route('mitigasi.createConnectionHor1') }}" method="POST">
                @csrf
                <input type="hidden" name="mitigation_record_id" value="{{ $id_record }}">
                @foreach ($mitigationRecord->mitigation_headers as $itemHead)
                    @if($itemHead->master_category_risk_id != 2)
                        @continue
                    @endif
                    <div class="row my-3">
                        <h5 class="fw-semibold text-danger">{{ $itemHead->description }} ({{ $itemHead->code }})</h5>
                    </div>
                    <div class="row">
                        <div class="col-1 text-center">
                            <h4>No</h4>
                        </div>
                        <div class="col-6 text-center">
                            <h4>Kejadian Risiko</h4>
                        </div>
                        <div class="col-5 text-center">
                            <h4>Hubungan</h4>
                        </div>
                    </div>
                    @foreach($mitigationRecord->mitigation_headers as $itemChild)
                        @if($itemChild->master_category_risk_id != 1)
                            @continue
                        @endif
                        <input type="hidden" name="target_mitigation_header_id[]" value="{{ $itemChild->id }}">
                        <input type="hidden" name="mitigation_header_id[]" value="{{ $itemHead->id }}">
                        <div class="row">
                            <div class="col-1">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control text-center" readonly value="{{ $itemChild->code }}" name="code[]"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" readonly value="{{ $itemChild->description }}" name="description[]"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <div class="input-group mb-3 justify-content-center">
                                        <select name="values[]" id="" class="form-control">
                                            <option disabled selected value="">Pilih</option>
                                            <option value="0">Tidak ada hubungan</option>
                                            <option value="1">Lemah</option>
                                            <option value="3">Sedang</option>
                                            <option value="9">Kuat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
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
        </div>
    </div>
@endsection