<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use App\Models\MasterCategoryRisk;
use App\Models\MitigationConnection;
use App\Models\MitigationHeader;
use App\Models\MitigationRecord;
use App\Models\MitigationResult;
use Barryvdh\DomPDF\Facade\Pdf;

class MitigasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mitigationRecords = MitigationRecord::all();
        return view('mitigasi.index', compact('mitigationRecords'));
    }

    public function edit($id_record)
    {
        $mitigationHeader = MitigationHeader::where('mitigation_record_id', $id_record)->get();
        return view('mitigasi.hor1.editindex', compact('mitigationHeader', 'id_record'));
    }

    public function update(Request $request, $id_record)
    {
        $descriptions = $request->description;
        $values = $request->value;
        $codes = $request->code;
        $category_ids = $request->category_id;
        $mitigation_header_ids = $request->mitigation_header_id;

        $index = 0;
        foreach ($mitigation_header_ids as $key => $mitid) {
            if(empty($descriptions[$index]) || empty($values[$index])) $index++;

            $mitigasi = MitigationHeader::find($mitid);
            $mitigasi->code = $codes[$index];
            $mitigasi->description = $descriptions[$index];
            $mitigasi->value = $values[$index];
            $mitigasi->master_category_risk_id = $category_ids[$index];
            $mitigasi->save();
            $index++;
        }

        // check if theres new data
        if(count($mitigation_header_ids) + 2 != count($descriptions)) {
            // if new data then start index is from count of mitigation_header_ids + 1
            $start = count($mitigation_header_ids) + 1;
            for ($i = $start; $i < count($descriptions); $i++) {
                if(empty($description) || empty($values[$key])) continue;

                $mitigasi = new MitigationHeader();
                $mitigasi->code = $codes[$i];
                $mitigasi->description = $descriptions[$i];
                $mitigasi->value = $values[$i];
                $mitigasi->mitigation_record_id = $id_record;
                $mitigasi->master_category_risk_id = $category_ids[$i];
                $mitigasi->user_id = auth()->user()->id;
                $mitigasi->save();
            }
        }

        return redirect()->route('hor1Connection', $id_record);
    }

    public function show($id_record)
    {
        $mitigationResult = MitigationResult::with('mitigation_headers')->where('mitigation_record_id', $id_record)->get();
        $masterCategoryRisks = MasterCategoryRisk::all();
        return view('mitigasi.hor1.show', compact('mitigationResult', 'masterCategoryRisks', 'id_record'));
    }

    public function createHor1(Request $request)
    {
        $descriptions = $request->description;
        $values = $request->value;
        $codes = $request->code;
        $category_ids = $request->category_id;

        $mitigationRecord = new MitigationRecord();
        $mitigationRecord->name = "REC-$request->type-".date('YmdHis');
        $mitigationRecord->save();

        foreach ($descriptions as $key => $description) {
            if(empty($description) || empty($values[$key])) continue;

            $mitigasi = new MitigationHeader();
            $mitigasi->code = $codes[$key];
            $mitigasi->description = $description;
            $mitigasi->value = $values[$key];
            $mitigasi->mitigation_record_id = $mitigationRecord->id;
            $mitigasi->master_category_risk_id = $category_ids[$key];
            $mitigasi->user_id = auth()->user()->id;
            $mitigasi->save();
        }

        return redirect()->route('hor1Connection', $mitigationRecord->id);
    }

    public function createHor2(Request $request)
    {
        $descriptions = $request->description;
        $values = $request->value;
        $codes = $request->code;
        $category_ids = $request->category_id;

        $mitigationRecord = MitigationRecord::find($request->id_record);
        $mitigationRecord->name = "REC-$request->type-".date('YmdHis');
        $mitigationRecord->save();

        foreach ($descriptions as $key => $description) {
            if(empty($description) || empty($values[$key])) continue;

            $mitigasi = new MitigationHeader();
            $mitigasi->code = $codes[$key];
            $mitigasi->description = $description;
            $mitigasi->value = $values[$key];
            $mitigasi->mitigation_record_id = $mitigationRecord->id;
            $mitigasi->master_category_risk_id = $category_ids[$key];
            $mitigasi->user_id = auth()->user()->id;
            $mitigasi->save();
        }

        return redirect()->route('hor2Connection', $mitigationRecord->id);
    }
    
    // Hor 1
    public function hor1()
    {
        return view('mitigasi.hor1.index');
    }

    public function hor1Connection($id_record)
    {
        $mitigationRecord = MitigationRecord::with('mitigation_headers')->find($id_record);
        $masterCategoryRisks = MasterCategoryRisk::all();
        return view('mitigasi.hor1.connection', compact('mitigationRecord', 'masterCategoryRisks', 'id_record'));
    }

    public function createConnectionHor1(Request $request)
    {
        $mitigation_header_ids = $request->mitigation_header_id;
        $target_mitigation_header_ids = $request->target_mitigation_header_id;

        foreach($mitigation_header_ids as $key => $mitigation_header_id) {
            $mitigationConnection = new MitigationConnection();
            $mitigationConnection->mitigation_header_id = $mitigation_header_id;
            $mitigationConnection->mitigation_record_id = $request->mitigation_record_id;
            $mitigationConnection->target_mitigation_header_id = $target_mitigation_header_ids[$key];
            $mitigationConnection->value = $request->values[$key];
            $mitigationConnection->save();
        }

        // count result

        $mitigationHeader = MitigationHeader::where('mitigation_record_id', $request->mitigation_record_id)->get();
        $riskEvents = $mitigationHeader->where('master_category_risk_id', 1);
        $riskSources = $mitigationHeader->where('master_category_risk_id', 2);

        $mitRes = [];

        foreach($riskSources as $riskSource) {
            $connectionValues = MitigationConnection::where('mitigation_header_id', $riskSource->id)->pluck('value');
            $occurrence = $riskSource->value;
            $severities = $riskEvents->pluck('value');
            $result = Helper::countMitigationRisk1($occurrence, $severities, $connectionValues);
            $mitigationResult = new MitigationResult();
            $mitigationResult->mitigation_header_id = $riskSource->id;
            $mitigationResult->master_category_risk_id = 2;
            $mitigationResult->value = $result;
            $mitRes[] = $mitigationResult;
        }

        $mitRes = collect($mitRes);

        $mitRes = $mitRes->sortByDesc('value');

        $sumMitigationRisk = $mitRes->sum('value');
        $counter = 1;
        
        $cumulative = 0;
        foreach($mitRes as $mitigationResult){
            $sum = Helper::sumMitigationRiskPercentage($mitigationResult->value, $sumMitigationRisk);
            $mitigationResult->sum = $sum;
            $mitigationResult->cumulative = $cumulative += $sum;
            $mitigationResult->rank = $counter;
            $mitigationResult->mitigation_record_id = $request->mitigation_record_id;
            $mitigationResult->save();
            $counter++;
        }

        return redirect()->route('hor1Result', $request->mitigation_record_id);
    }

    public function hor1Result($id_record)
    {
        $mitigationResult = MitigationResult::with('mitigation_headers')->where('mitigation_record_id', $id_record)->where('master_category_risk_id', 2)->get();
        $masterCategoryRisks = MasterCategoryRisk::all();
        return view('mitigasi.hor1.result', compact('mitigationResult', 'masterCategoryRisks', 'id_record'));
    }

    // Hor 2
    public function hor2($id_record)
    {
        $mitigationResult = MitigationResult::with('mitigation_headers')->where('mitigation_record_id', $id_record)->where('cumulative', '<', 80)->where('master_category_risk_id', 2)->get();
        return view('mitigasi.hor2.index', compact('mitigationResult', 'id_record'));
    }
    public function hor2Connection($id_record)
    {
        $mitigationRecord = MitigationRecord::find($id_record)->with('mitigation_headers')->first();
        $mitigationResults = MitigationResult::with('mitigation_headers')->where('mitigation_record_id', $id_record)->where('cumulative', '<', 80)->where('master_category_risk_id', 2)->get();
        $masterCategoryRisks = MasterCategoryRisk::all();
        return view('mitigasi.hor2.connection', compact('mitigationRecord', 'mitigationResults', 'masterCategoryRisks', 'id_record'));
    }

    public function createConnectionHor2(Request $request)
    {
        $mitigation_header_ids = $request->mitigation_header_id;
        $target_mitigation_header_ids = $request->target_mitigation_header_id;

        foreach($mitigation_header_ids as $key => $mitigation_header_id) {
            $mitigationConnection = new MitigationConnection();
            $mitigationConnection->mitigation_header_id = $mitigation_header_id;
            $mitigationConnection->mitigation_record_id = $request->mitigation_record_id;
            $mitigationConnection->target_mitigation_header_id = $target_mitigation_header_ids[$key];
            $mitigationConnection->value = $request->values[$key];
            $mitigationConnection->save();
        }

        // count result

        $mitigationHeader = MitigationHeader::where('mitigation_record_id', $request->mitigation_record_id)->get();
        $riskMitigations = $mitigationHeader->where('master_category_risk_id', 3);
        $riskSources = MitigationResult::where('mitigation_record_id', $request->mitigation_record_id)->where('master_category_risk_id', 2)->where('cumulative', '<', 80);

        $mitRes = [];

        foreach($riskMitigations as $riskMitigation) {
            $connectionValues = MitigationConnection::where('mitigation_header_id', $riskMitigation->id)->pluck('value');
            $degree = $riskMitigation->value;
            $arp = $riskSources->pluck('value');
            $result = Helper::countMitigationRisk2($degree, $arp, $connectionValues);
            $mitigationResult = new MitigationResult();
            $mitigationResult->mitigation_header_id = $riskMitigation->id;
            $mitigationResult->master_category_risk_id = 3;
            $mitigationResult->value = $result;
            $mitRes[] = $mitigationResult;
        }

        $mitRes = collect($mitRes);

        $mitRes = $mitRes->sortByDesc('value');

        $sumMitigationRisk = $mitRes->sum('value');
        $counter = 1;
        
        $cumulative = 0;
        foreach($mitRes as $mitigationResult){
            $sum = Helper::sumMitigationRiskPercentage($mitigationResult->value, $sumMitigationRisk);
            $mitigationResult->sum = $sum;
            $mitigationResult->cumulative = $cumulative += $sum;
            $mitigationResult->rank = $counter;
            $mitigationResult->mitigation_record_id = $request->mitigation_record_id;
            $mitigationResult->save();
            $counter++;
        }

        return redirect()->route('hor2Result', $request->mitigation_record_id);
    }

    public function hor2Result($id_record)
    {
        $mitigationResult = MitigationResult::with('mitigation_headers')->where('mitigation_record_id', $id_record)->where('master_category_risk_id', 3)->get();
        $masterCategoryRisks = MasterCategoryRisk::all();
        return view('mitigasi.hor2.result', compact('mitigationResult', 'masterCategoryRisks', 'id_record'));
    }

    public function pdf($id_record,$id_category)
    {
        $mitigationResult = MitigationResult::with('mitigation_headers')->where('mitigation_record_id', $id_record)->where('master_category_risk_id', $id_category)->get();
        $masterCategoryRisks = MasterCategoryRisk::find($id_category);
        $pdf = PDF::loadView('mitigasi.print', compact('mitigationResult', 'masterCategoryRisks', 'id_record'));
        return $pdf->download('mitigasi.pdf');
    }
}
