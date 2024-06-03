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
                'order_cost' => 'required|numeric|gt:0',
                'store_cost' => 'required|numeric|gt:0',
                'demand' => 'required|numeric|gt:0',
                'price' => 'required|numeric|gt:0',
                'deviation' => 'required|numeric|gt:0',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $s = $request->order_cost; // Biaya pesan
        $d = $request->demand;
        $i = $request->store_cost / 100; // Holding Cost
        $c = $request->price; //Harga jual produk

        $H = $i * $c * 2500;

        $EOQ = Helper::getEOQ($d, $s, $H);
        $durian_quantity = $d/$EOQ;

        $safety_stock = Helper::getSafetyStock($request->deviation);

        $persediaan = new Inventory;
        $persediaan->durian_quantity = round($durian_quantity);
        $persediaan->eoq = $EOQ;
        $persediaan->store_cost = $request->store_cost;
        $persediaan->order_cost = $request->order_cost;
        $persediaan->demand = $request->demand;
        $persediaan->price = $request->price;
        $persediaan->user_id = auth()->user()->id;
        $persediaan->safety_stock = $safety_stock;
        $persediaan->deviation = $request->deviation;
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
                'order_cost' => 'required|numeric|gt:0',
                'store_cost' => 'required|numeric|gt:0',
                'demand' => 'required|numeric|gt:0',
                'price' => 'required|numeric|gt:0',
                'deviation' => 'required|numeric|gt:0',
            ]);
        }catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        $s = $request->order_cost; // Biaya pesan
        $d = $request->demand;
        $i = $request->store_cost / 100; // Holding Cost
        $c = $request->price; //Harga jual produk

        $H = $i * $c * 2500;

        $EOQ = Helper::getEOQ($d, $s, $H);
        $durian_quantity = $d/$EOQ;

        $safety_stock = Helper::getSafetyStock($request->deviation);

        $persediaan = Inventory::find($id);
        $persediaan->durian_quantity = round($durian_quantity);
        $persediaan->eoq = $EOQ;
        $persediaan->store_cost = $request->store_cost;
        $persediaan->order_cost = $request->order_cost;
        $persediaan->demand = $request->demand;
        $persediaan->price = $request->price;
        $persediaan->user_id = auth()->user()->id;
        $persediaan->safety_stock = $safety_stock;
        $persediaan->deviation = $request->deviation;
        $persediaan->save();

        return redirect()->route('editPersediaan', ['id' => $persediaan->id])->with('success', 'Data berhasil diubah');
    }

    public function delete($id){
        $persediaan = Inventory::find($id);
        $persediaan->delete();
        return redirect()->route('historyPersediaan')->with('success', 'Data berhasil dihapus');
    }
}
