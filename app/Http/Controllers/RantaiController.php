<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Performance;
use App\Http\Helpers\Helper;

class RantaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('rantai.index');
    }

    public function form()
    {
        return view('rantai.form');
    }

    public function history()
    {
        $performances = Performance::with('user')->get();
        // dd($performance);
        return view('rantai.history', compact('performances'));
    }

    public function store(Request $request){
        try{
            $request->validate([
                'min_orders_shipped' => 'required|numeric|gt:0',
                'max_orders_shipped' => 'required|numeric|gt:0',
                'act_orders_shipped' => 'required|numeric|gt:0',
                'min_requests_fulfilled' => 'required|numeric|gt:0',
                'max_requests_fulfilled' => 'required|numeric|gt:0',
                'act_requests_fulfilled' => 'required|numeric|gt:0',
                'min_number_of_shipments' => 'required|numeric|gt:0',
                'max_number_of_shipments' => 'required|numeric|gt:0',
                'act_number_of_shipments' => 'required|numeric|gt:0',
                'min_lead_time' => 'required|numeric|gt:0',
                'max_lead_time' => 'required|numeric|gt:0',
                'act_lead_time' => 'required|numeric|gt:0',
                'min_order_cycles' => 'required|numeric|gt:0',
                'max_order_cycles' => 'required|numeric|gt:0',
                'act_order_cycles' => 'required|numeric|gt:0',
                'min_flexibility' => 'required|numeric|gt:0',
                'max_flexibility' => 'required|numeric|gt:0',
                'act_flexibility' => 'required|numeric|gt:0',
                'min_supply_chain_costs' => 'required|numeric|gt:0',
                'max_supply_chain_costs' => 'required|numeric|gt:0',
                'act_supply_chain_costs' => 'required|numeric|gt:0',
                'min_cogs' => 'required|numeric|gt:0',
                'max_cogs' => 'required|numeric|gt:0',
                'act_cogs' => 'required|numeric|gt:0',
                'min_payback_cycle' => 'required|numeric|gt:0',
                'max_payback_cycle' => 'required|numeric|gt:0',
                'act_payback_cycle' => 'required|numeric|gt:0',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $min_orders_shipped = $request->min_orders_shipped;
        $max_orders_shipped = $request->max_orders_shipped;
        $act_orders_shipped = $request->act_orders_shipped;
        $min_requests_fulfilled = $request->min_requests_fulfilled;
        $max_requests_fulfilled = $request->max_requests_fulfilled;
        $act_requests_fulfilled = $request->act_requests_fulfilled;
        $min_number_of_shipments = $request->min_number_of_shipments;
        $max_number_of_shipments = $request->max_number_of_shipments;
        $act_number_of_shipments = $request->act_number_of_shipments;
        $min_lead_time = $request->min_lead_time;
        $max_lead_time = $request->max_lead_time;
        $act_lead_time = $request->act_lead_time;
        $min_order_cycles = $request->min_order_cycles;
        $max_order_cycles = $request->max_order_cycles;
        $act_order_cycles = $request->act_order_cycles;
        $min_flexibility = $request->min_flexibility;
        $max_flexibility = $request->max_flexibility;
        $act_flexibility = $request->act_flexibility;
        $min_supply_chain_costs = $request->min_supply_chain_costs;
        $max_supply_chain_costs = $request->max_supply_chain_costs;
        $act_supply_chain_costs = $request->act_supply_chain_costs;
        $min_cogs = $request->min_cogs;
        $max_cogs = $request->max_cogs;
        $act_cogs = $request->act_cogs;
        $min_payback_cycle = $request->min_payback_cycle;
        $max_payback_cycle = $request->max_payback_cycle;
        $act_payback_cycle = $request->act_payback_cycle;

        $orders_shipped_count = Helper::countOrderShipped($act_orders_shipped, $max_orders_shipped);
        $requests_fulfilled_count = Helper::countRequestsFulfilled($act_requests_fulfilled, $max_requests_fulfilled);
        $number_of_shipments_count = Helper::countNumberOfShipments($act_number_of_shipments, $max_number_of_shipments);
        $lead_time_count = Helper::countLeadTime($act_lead_time, $min_lead_time);
        $order_cycles_count = Helper::countOrderCycles($act_order_cycles, $min_order_cycles);
        $flexibility_count = Helper::countFlexibility($act_flexibility, $min_flexibility);
        $supply_chain_costs_count = Helper::countSupplyChainCosts($act_supply_chain_costs, $min_supply_chain_costs);
        $cogs_count = Helper::countCogs($act_cogs, $min_cogs);
        $payback_cycle_count = Helper::countPaybackCycle($act_payback_cycle, $min_payback_cycle);

        $total = Helper::sumAll($orders_shipped_count, $requests_fulfilled_count, $number_of_shipments_count, $lead_time_count, $order_cycles_count, $flexibility_count, $supply_chain_costs_count, $cogs_count, $payback_cycle_count);
        $status = Helper::getStatusPerformance($total);

        $performance = new Performance();
        $performance->min_orders_shipped = $min_orders_shipped;
        $performance->max_orders_shipped = $max_orders_shipped;
        $performance->act_orders_shipped = $act_orders_shipped;
        $performance->min_requests_fulfilled = $min_requests_fulfilled;
        $performance->max_requests_fulfilled = $max_requests_fulfilled;
        $performance->act_requests_fulfilled = $act_requests_fulfilled;
        $performance->min_number_of_shipments = $min_number_of_shipments;
        $performance->max_number_of_shipments = $max_number_of_shipments;
        $performance->act_number_of_shipments = $act_number_of_shipments;
        $performance->min_lead_time = $min_lead_time;
        $performance->max_lead_time = $max_lead_time;
        $performance->act_lead_time = $act_lead_time;
        $performance->min_order_cycles = $min_order_cycles;
        $performance->max_order_cycles = $max_order_cycles;
        $performance->act_order_cycles = $act_order_cycles;
        $performance->min_flexibility = $min_flexibility;
        $performance->max_flexibility = $max_flexibility;
        $performance->act_flexibility = $act_flexibility;
        $performance->min_supply_chain_costs = $min_supply_chain_costs;
        $performance->max_supply_chain_costs = $max_supply_chain_costs;
        $performance->act_supply_chain_costs = $act_supply_chain_costs;
        $performance->min_cogs = $min_cogs;
        $performance->max_cogs = $max_cogs;
        $performance->act_cogs = $act_cogs;
        $performance->min_payback_cycle = $min_payback_cycle;
        $performance->max_payback_cycle = $max_payback_cycle;
        $performance->act_payback_cycle = $act_payback_cycle;
        $performance->total = round($total);
        $performance->status = $status;
        $performance->user_id = auth()->user()->id;

        $performance->save();

        return redirect()->route('editRantai', ['id' => $performance->id])->with('success', 'Performance data added successfully.');
    }

    public function edit($id)
    {
        try {
            $performance = Performance::findOrFail($id);
            return view('rantai.edit', compact('performance'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Performance data not found.');
        }
    }

    // public function updateOld(Request $request, $id)
    // {
    //     try {
    //         $performance = Performance::findOrFail($id);

    //         $request->validate([
    //             'orders_shipped' => 'required|numeric|gt:0',
    //             'target_orders_shipped' => 'required|numeric|gt:0',
    //             'requests_fulfilled' => 'required|numeric|gt:0',
    //             'target_requests_fulfilled' => 'required|numeric|gt:0',
    //             'number_of_shipments' => 'required|numeric|gt:0',
    //             'target_number_of_shipments' => 'required|numeric|gt:0',
    //             'lead_time' => 'required|numeric|gt:0',
    //             'target_lead_time' => 'required|numeric|gt:0',
    //             'order_cycles' => 'required|numeric|gt:0',
    //             'target_order_cycles' => 'required|numeric|gt:0',
    //             'flexibility' => 'required|numeric|gt:0',
    //             'target_flexibility' => 'required|numeric|gt:0',
    //             'supply_chain_costs' => 'required|numeric|gt:0',
    //             'target_supply_chain_costs' => 'required|numeric|gt:0',
    //             'cogs' => 'required|numeric|gt:0',
    //             'target_cogs' => 'required|numeric|gt:0',
    //             'payback_cycle' => 'required|numeric|gt:0',
    //             'target_payback_cycle' => 'required|numeric|gt:0',
    //         ]);

    //         $orders_shipped = $request->orders_shipped;
    //         $target_orders_shipped = $request->target_orders_shipped;
    //         $requests_fulfilled = $request->requests_fulfilled;
    //         $target_requests_fulfilled = $request->target_requests_fulfilled;
    //         $number_of_shipments = $request->number_of_shipments;
    //         $target_number_of_shipments = $request->target_number_of_shipments;
    //         $lead_time = $request->lead_time;
    //         $target_lead_time = $request->target_lead_time;
    //         $order_cycles = $request->order_cycles;
    //         $target_order_cycles = $request->target_order_cycles;
    //         $flexibility = $request->flexibility;
    //         $target_flexibility = $request->target_flexibility;
    //         $supply_chain_costs = $request->supply_chain_costs;
    //         $target_supply_chain_costs = $request->target_supply_chain_costs;
    //         $cogs = $request->cogs;
    //         $target_cogs = $request->target_cogs;
    //         $payback_cycle = $request->payback_cycle;
    //         $target_payback_cycle = $request->target_payback_cycle;

    //         $orders_shipped_count = Helper::countOrderShipped($orders_shipped, $target_orders_shipped);
    //         $requests_fulfilled_count = Helper::countRequestsFulfilled($requests_fulfilled, $target_requests_fulfilled);
    //         $number_of_shipments_count = Helper::countNumberOfShipments($number_of_shipments, $target_number_of_shipments);
    //         $lead_time_count = Helper::countLeadTime($lead_time, $target_lead_time);
    //         $order_cycles_count = Helper::countOrderCycles($order_cycles, $target_order_cycles);
    //         $flexibility_count = Helper::countFlexibility($flexibility, $target_flexibility);
    //         $supply_chain_costs_count = Helper::countSupplyChainCosts($supply_chain_costs, $target_supply_chain_costs);
    //         $cogs_count = Helper::countCogs($cogs, $target_cogs);
    //         $payback_cycle_count = Helper::countPaybackCycle($payback_cycle, $target_payback_cycle);

    //         $total = Helper::sumAll($orders_shipped_count, $requests_fulfilled_count, $number_of_shipments_count, $lead_time_count, $order_cycles_count, $flexibility_count, $supply_chain_costs_count, $cogs_count, $payback_cycle_count);
    //         $status = Helper::getStatusPerformance($total);

    //         $performance->orders_shipped = $orders_shipped;
    //         $performance->target_orders_shipped = $target_orders_shipped;
    //         $performance->requests_fulfilled = $requests_fulfilled;
    //         $performance->target_requests_fulfilled = $target_requests_fulfilled;
    //         $performance->number_of_shipments = $number_of_shipments;
    //         $performance->target_number_of_shipments = $target_number_of_shipments;
    //         $performance->lead_time = $lead_time;
    //         $performance->target_lead_time = $target_lead_time;
    //         $performance->order_cycles = $order_cycles;
    //         $performance->target_order_cycles = $target_order_cycles;
    //         $performance->flexibility = $flexibility;
    //         $performance->target_flexibility = $target_flexibility;
    //         $performance->supply_chain_costs = $supply_chain_costs;
    //         $performance->target_supply_chain_costs = $target_supply_chain_costs;
    //         $performance->cogs = $cogs;
    //         $performance->target_cogs = $target_cogs;
    //         $performance->payback_cycle = $payback_cycle;
    //         $performance->target_payback_cycle = $target_payback_cycle;
    //         $performance->status = $status;
    //         $performance->total = round($total);

    //         $performance->save();

    //         return redirect()->back()->with('success', 'Performance data updated successfully.');
    //     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
    //         return redirect()->back()->with('error', 'Performance data not found.');
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return redirect()->back()->withErrors($e->errors())->withInput();
    //     }
    // }

    public function update(Request $request, $id)
    {
        $performance = Performance::findOrFail($id);
        try {
            $request->validate([
                'min_orders_shipped' => 'required|numeric|gt:0',
                'max_orders_shipped' => 'required|numeric|gt:0',
                'act_orders_shipped' => 'required|numeric|gt:0',
                'min_requests_fulfilled' => 'required|numeric|gt:0',
                'max_requests_fulfilled' => 'required|numeric|gt:0',
                'act_requests_fulfilled' => 'required|numeric|gt:0',
                'min_number_of_shipments' => 'required|numeric|gt:0',
                'max_number_of_shipments' => 'required|numeric|gt:0',
                'act_number_of_shipments' => 'required|numeric|gt:0',
                'min_lead_time' => 'required|numeric|gt:0',
                'max_lead_time' => 'required|numeric|gt:0',
                'act_lead_time' => 'required|numeric|gt:0',
                'min_order_cycles' => 'required|numeric|gt:0',
                'max_order_cycles' => 'required|numeric|gt:0',
                'act_order_cycles' => 'required|numeric|gt:0',
                'min_flexibility' => 'required|numeric|gt:0',
                'max_flexibility' => 'required|numeric|gt:0',
                'act_flexibility' => 'required|numeric|gt:0',
                'min_supply_chain_costs' => 'required|numeric|gt:0',
                'max_supply_chain_costs' => 'required|numeric|gt:0',
                'act_supply_chain_costs' => 'required|numeric|gt:0',
                'min_cogs' => 'required|numeric|gt:0',
                'max_cogs' => 'required|numeric|gt:0',
                'act_cogs' => 'required|numeric|gt:0',
                'min_payback_cycle' => 'required|numeric|gt:0',
                'max_payback_cycle' => 'required|numeric|gt:0',
                'act_payback_cycle' => 'required|numeric|gt:0',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $min_orders_shipped = $request->min_orders_shipped;
        $max_orders_shipped = $request->max_orders_shipped;
        $act_orders_shipped = $request->act_orders_shipped;
        $min_requests_fulfilled = $request->min_requests_fulfilled;
        $max_requests_fulfilled = $request->max_requests_fulfilled;
        $act_requests_fulfilled = $request->act_requests_fulfilled;
        $min_number_of_shipments = $request->min_number_of_shipments;
        $max_number_of_shipments = $request->max_number_of_shipments;
        $act_number_of_shipments = $request->act_number_of_shipments;
        $min_lead_time = $request->min_lead_time;
        $max_lead_time = $request->max_lead_time;
        $act_lead_time = $request->act_lead_time;
        $min_order_cycles = $request->min_order_cycles;
        $max_order_cycles = $request->max_order_cycles;
        $act_order_cycles = $request->act_order_cycles;
        $min_flexibility = $request->min_flexibility;
        $max_flexibility = $request->max_flexibility;
        $act_flexibility = $request->act_flexibility;
        $min_supply_chain_costs = $request->min_supply_chain_costs;
        $max_supply_chain_costs = $request->max_supply_chain_costs;
        $act_supply_chain_costs = $request->act_supply_chain_costs;
        $min_cogs = $request->min_cogs;
        $max_cogs = $request->max_cogs;
        $act_cogs = $request->act_cogs;
        $min_payback_cycle = $request->min_payback_cycle;
        $max_payback_cycle = $request->max_payback_cycle;
        $act_payback_cycle = $request->act_payback_cycle;

        $orders_shipped_count = Helper::countOrderShipped($act_orders_shipped, $max_orders_shipped);
        $requests_fulfilled_count = Helper::countRequestsFulfilled($act_requests_fulfilled, $max_requests_fulfilled);
        $number_of_shipments_count = Helper::countNumberOfShipments($act_number_of_shipments, $max_number_of_shipments);
        $lead_time_count = Helper::countLeadTime($act_lead_time, $min_lead_time);
        $order_cycles_count = Helper::countOrderCycles($act_order_cycles, $min_order_cycles);
        $flexibility_count = Helper::countFlexibility($act_flexibility, $min_flexibility);
        $supply_chain_costs_count = Helper::countSupplyChainCosts($act_supply_chain_costs, $min_supply_chain_costs);
        $cogs_count = Helper::countCogs($act_cogs, $min_cogs);
        $payback_cycle_count = Helper::countPaybackCycle($act_payback_cycle, $min_payback_cycle);

        $total = Helper::sumAll($orders_shipped_count, $requests_fulfilled_count, $number_of_shipments_count, $lead_time_count, $order_cycles_count, $flexibility_count, $supply_chain_costs_count, $cogs_count, $payback_cycle_count);
        $status = Helper::getStatusPerformance($total);

        $performance->min_orders_shipped = $min_orders_shipped;
        $performance->max_orders_shipped = $max_orders_shipped;
        $performance->act_orders_shipped = $act_orders_shipped;
        $performance->min_requests_fulfilled = $min_requests_fulfilled;
        $performance->max_requests_fulfilled = $max_requests_fulfilled;
        $performance->act_requests_fulfilled = $act_requests_fulfilled;
        $performance->min_number_of_shipments = $min_number_of_shipments;
        $performance->max_number_of_shipments = $max_number_of_shipments;
        $performance->act_number_of_shipments = $act_number_of_shipments;
        $performance->min_lead_time = $min_lead_time;
        $performance->max_lead_time = $max_lead_time;
        $performance->act_lead_time = $act_lead_time;
        $performance->min_order_cycles = $min_order_cycles;
        $performance->max_order_cycles = $max_order_cycles;
        $performance->act_order_cycles = $act_order_cycles;
        $performance->min_flexibility = $min_flexibility;
        $performance->max_flexibility = $max_flexibility;
        $performance->act_flexibility = $act_flexibility;
        $performance->min_supply_chain_costs = $min_supply_chain_costs;
        $performance->max_supply_chain_costs = $max_supply_chain_costs;
        $performance->act_supply_chain_costs = $act_supply_chain_costs;
        $performance->min_cogs = $min_cogs;
        $performance->max_cogs = $max_cogs;
        $performance->act_cogs = $act_cogs;
        $performance->min_payback_cycle = $min_payback_cycle;
        $performance->max_payback_cycle = $max_payback_cycle;
        $performance->act_payback_cycle = $act_payback_cycle;
        $performance->total = round($total);
        $performance->status = $status;
        $performance->user_id = auth()->user()->id;

        $performance->save();
        return redirect()->back()->with('success', 'Performance data updated successfully.');
    }

    public function delete($id)
    {
        try {
            $performance = Performance::findOrFail($id);
            $performance->delete();

            return redirect()->back()->with('success', 'Performance data deleted successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Performance data not found.');
        }
    }
}
