<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Performance;
use App\Http\Helpers\Helper;

class RantaiController extends Controller
{
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
                'orders_shipped' => 'required|numeric|gt:0',
                'target_orders_shipped' => 'required|numeric|gt:0',
                'requests_fulfilled' => 'required|numeric|gt:0',
                'target_requests_fulfilled' => 'required|numeric|gt:0',
                'number_of_shipments' => 'required|numeric|gt:0',
                'target_number_of_shipments' => 'required|numeric|gt:0',
                'lead_time' => 'required|numeric|gt:0',
                'target_lead_time' => 'required|numeric|gt:0',
                'order_cycles' => 'required|numeric|gt:0',
                'target_order_cycles' => 'required|numeric|gt:0',
                'flexibility' => 'required|numeric|gt:0',
                'target_flexibility' => 'required|numeric|gt:0',
                'supply_chain_costs' => 'required|numeric|gt:0',
                'target_supply_chain_costs' => 'required|numeric|gt:0',
                'cogs' => 'required|numeric|gt:0',
                'target_cogs' => 'required|numeric|gt:0',
                'payback_cycle' => 'required|numeric|gt:0',
                'target_payback_cycle' => 'required|numeric|gt:0',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $orders_shipped = $request->orders_shipped;
        $target_orders_shipped = $request->target_orders_shipped;
        $requests_fulfilled = $request->requests_fulfilled;
        $target_requests_fulfilled = $request->target_requests_fulfilled;
        $number_of_shipments = $request->number_of_shipments;
        $target_number_of_shipments = $request->target_number_of_shipments;
        $lead_time = $request->lead_time;
        $target_lead_time = $request->target_lead_time;
        $order_cycles = $request->order_cycles;
        $target_order_cycles = $request->target_order_cycles;
        $flexibility = $request->flexibility;
        $target_flexibility = $request->target_flexibility;
        $supply_chain_costs = $request->supply_chain_costs;
        $target_supply_chain_costs = $request->target_supply_chain_costs;
        $cogs = $request->cogs;
        $target_cogs = $request->target_cogs;
        $payback_cycle = $request->payback_cycle;
        $target_payback_cycle = $request->target_payback_cycle;

        $orders_shipped_count = Helper::countOrderShipped($orders_shipped, $target_orders_shipped);
        $requests_fulfilled_count = Helper::countRequestsFulfilled($requests_fulfilled, $target_requests_fulfilled);
        $number_of_shipments_count = Helper::countNumberOfShipments($number_of_shipments, $target_number_of_shipments);
        $lead_time_count = Helper::countLeadTime($lead_time, $target_lead_time);
        $order_cycles_count = Helper::countOrderCycles($order_cycles, $target_order_cycles);
        $flexibility_count = Helper::countFlexibility($flexibility, $target_flexibility);
        $supply_chain_costs_count = Helper::countSupplyChainCosts($supply_chain_costs, $target_supply_chain_costs);
        $cogs_count = Helper::countCogs($cogs, $target_cogs);
        $payback_cycle_count = Helper::countPaybackCycle($payback_cycle, $target_payback_cycle);

        $total = Helper::sumAll($orders_shipped_count, $requests_fulfilled_count, $number_of_shipments_count, $lead_time_count, $order_cycles_count, $flexibility_count, $supply_chain_costs_count, $cogs_count, $payback_cycle_count);
        $status = Helper::getStatusPerformance($total);

        $performance = new Performance();
        $performance->orders_shipped = $orders_shipped;
        $performance->target_orders_shipped = $target_orders_shipped;
        $performance->requests_fulfilled = $requests_fulfilled;
        $performance->target_requests_fulfilled = $target_requests_fulfilled;
        $performance->number_of_shipments = $number_of_shipments;
        $performance->target_number_of_shipments = $target_number_of_shipments;
        $performance->lead_time = $lead_time;
        $performance->target_lead_time = $target_lead_time;
        $performance->order_cycles = $order_cycles;
        $performance->target_order_cycles = $target_order_cycles;
        $performance->flexibility = $flexibility;
        $performance->target_flexibility = $target_flexibility;
        $performance->supply_chain_costs = $supply_chain_costs;
        $performance->target_supply_chain_costs = $target_supply_chain_costs;
        $performance->cogs = $cogs;
        $performance->target_cogs = $target_cogs;
        $performance->payback_cycle = $payback_cycle;
        $performance->target_payback_cycle = $target_payback_cycle;
        $performance->status = $status;
        $performance->total = round($total);
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

    public function update(Request $request, $id)
    {
        try {
            $performance = Performance::findOrFail($id);

            $request->validate([
                'orders_shipped' => 'required|numeric|gt:0',
                'target_orders_shipped' => 'required|numeric|gt:0',
                'requests_fulfilled' => 'required|numeric|gt:0',
                'target_requests_fulfilled' => 'required|numeric|gt:0',
                'number_of_shipments' => 'required|numeric|gt:0',
                'target_number_of_shipments' => 'required|numeric|gt:0',
                'lead_time' => 'required|numeric|gt:0',
                'target_lead_time' => 'required|numeric|gt:0',
                'order_cycles' => 'required|numeric|gt:0',
                'target_order_cycles' => 'required|numeric|gt:0',
                'flexibility' => 'required|numeric|gt:0',
                'target_flexibility' => 'required|numeric|gt:0',
                'supply_chain_costs' => 'required|numeric|gt:0',
                'target_supply_chain_costs' => 'required|numeric|gt:0',
                'cogs' => 'required|numeric|gt:0',
                'target_cogs' => 'required|numeric|gt:0',
                'payback_cycle' => 'required|numeric|gt:0',
                'target_payback_cycle' => 'required|numeric|gt:0',
            ]);

            $orders_shipped = $request->orders_shipped;
            $target_orders_shipped = $request->target_orders_shipped;
            $requests_fulfilled = $request->requests_fulfilled;
            $target_requests_fulfilled = $request->target_requests_fulfilled;
            $number_of_shipments = $request->number_of_shipments;
            $target_number_of_shipments = $request->target_number_of_shipments;
            $lead_time = $request->lead_time;
            $target_lead_time = $request->target_lead_time;
            $order_cycles = $request->order_cycles;
            $target_order_cycles = $request->target_order_cycles;
            $flexibility = $request->flexibility;
            $target_flexibility = $request->target_flexibility;
            $supply_chain_costs = $request->supply_chain_costs;
            $target_supply_chain_costs = $request->target_supply_chain_costs;
            $cogs = $request->cogs;
            $target_cogs = $request->target_cogs;
            $payback_cycle = $request->payback_cycle;
            $target_payback_cycle = $request->target_payback_cycle;

            $orders_shipped_count = Helper::countOrderShipped($orders_shipped, $target_orders_shipped);
            $requests_fulfilled_count = Helper::countRequestsFulfilled($requests_fulfilled, $target_requests_fulfilled);
            $number_of_shipments_count = Helper::countNumberOfShipments($number_of_shipments, $target_number_of_shipments);
            $lead_time_count = Helper::countLeadTime($lead_time, $target_lead_time);
            $order_cycles_count = Helper::countOrderCycles($order_cycles, $target_order_cycles);
            $flexibility_count = Helper::countFlexibility($flexibility, $target_flexibility);
            $supply_chain_costs_count = Helper::countSupplyChainCosts($supply_chain_costs, $target_supply_chain_costs);
            $cogs_count = Helper::countCogs($cogs, $target_cogs);
            $payback_cycle_count = Helper::countPaybackCycle($payback_cycle, $target_payback_cycle);

            $total = Helper::sumAll($orders_shipped_count, $requests_fulfilled_count, $number_of_shipments_count, $lead_time_count, $order_cycles_count, $flexibility_count, $supply_chain_costs_count, $cogs_count, $payback_cycle_count);
            $status = Helper::getStatusPerformance($total);

            $performance->orders_shipped = $orders_shipped;
            $performance->target_orders_shipped = $target_orders_shipped;
            $performance->requests_fulfilled = $requests_fulfilled;
            $performance->target_requests_fulfilled = $target_requests_fulfilled;
            $performance->number_of_shipments = $number_of_shipments;
            $performance->target_number_of_shipments = $target_number_of_shipments;
            $performance->lead_time = $lead_time;
            $performance->target_lead_time = $target_lead_time;
            $performance->order_cycles = $order_cycles;
            $performance->target_order_cycles = $target_order_cycles;
            $performance->flexibility = $flexibility;
            $performance->target_flexibility = $target_flexibility;
            $performance->supply_chain_costs = $supply_chain_costs;
            $performance->target_supply_chain_costs = $target_supply_chain_costs;
            $performance->cogs = $cogs;
            $performance->target_cogs = $target_cogs;
            $performance->payback_cycle = $payback_cycle;
            $performance->target_payback_cycle = $target_payback_cycle;
            $performance->status = $status;
            $performance->total = round($total);

            $performance->save();

            return redirect()->back()->with('success', 'Performance data updated successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Performance data not found.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
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
