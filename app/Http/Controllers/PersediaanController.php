<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Http\Helpers\Helper;

class PersediaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('persediaan.index');
    }

    public function history()
    {
        $inventories = Inventory::with('user')->get();
        // dd($inventories);
        return view('persediaan.history', compact('inventories'));
    }

    public function store(Request $request){
        try{
            $request->validate([
                'durian_quantity' => 'required|numeric|gt:0',
                'durian_received' => 'required|numeric|gt:0',
                'last_sent_at' => 'required|date',
                'last_received_at' => 'required|date|after:last_sent_at',
                'store_cost' => 'required|numeric|gt:0',
                'order_cost' => 'required|numeric|gt:0',
                'demand' => 'required|numeric|gt:0',
                'price' => 'required|numeric|gt:0',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        // $H = ($request->store_cost + $request->order_cost) / $request->durian_received;
        // $S = $request->price;
        // $D = $request->demand;
        // $EOQ = sqrt((2 * $D * $S) / $H);

        $EOQ = Helper::getEOQ($request->store_cost, $request->order_cost, $request->durian_received, $request->price, $request->demand);

        $persediaan = new Inventory;
        $persediaan->durian_quantity = $request->durian_quantity;
        $persediaan->durian_received = $request->durian_received;
        $persediaan->minimum_stock = $EOQ;
        $persediaan->last_sent_at = $request->last_sent_at;
        $persediaan->last_received_at = $request->last_received_at;
        $persediaan->store_cost = $request->store_cost;
        $persediaan->order_cost = $request->order_cost;
        $persediaan->demand = $request->demand;
        $persediaan->price = $request->price;
        $persediaan->user_id = auth()->user()->id;
        $persediaan->save();

        return redirect()->route('editPersediaan', ['id' => $persediaan->id])->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id){
        $persediaan = Inventory::find($id);
        return view('persediaan.edit', compact('persediaan'));
    }

    public function update(Request $request, $id){
        try{
            $request->validate([
                'durian_quantity' => 'required',
                'durian_received' => 'required',
                'last_sent_at' => 'required',
                'last_received_at' => 'required',
                'store_cost' => 'required',
                'order_cost' => 'required',
                'demand' => 'required',
                'price' => 'required',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        // $H = ($request->store_cost + $request->order_cost) / $request->durian_received;
        // $S = $request->price;
        // $D = $request->demand;
        // $EOQ = sqrt((2 * $D * $S) / $H);

        $EOQ = Helper::getEOQ($request->store_cost, $request->order_cost, $request->durian_received, $request->price, $request->demand);

        $persediaan = Inventory::find($id);
        $persediaan->durian_quantity = $request->durian_quantity;
        $persediaan->durian_received = $request->durian_received;
        $persediaan->minimum_stock = $EOQ;
        $persediaan->last_sent_at = $request->last_sent_at;
        $persediaan->last_received_at = $request->last_received_at;
        $persediaan->store_cost = $request->store_cost;
        $persediaan->order_cost = $request->order_cost;
        $persediaan->demand = $request->demand;
        $persediaan->price = $request->price;
        $persediaan->user_id = auth()->user()->id;
        $persediaan->save();

        return redirect()->route('editPersediaan', ['id' => $persediaan->id])->with('success', 'Data berhasil diubah');
    }

    public function delete($id){
        $persediaan = Inventory::find($id);
        $persediaan->delete();
        return redirect()->route('historyPersediaan')->with('success', 'Data berhasil dihapus');
    }
}
