<?php

namespace App\Http\Controllers;

use App\Models\Inventories;
use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($transactionDate)
    {
        
        $itemsdummy = \DB::select("select * from dummies");

        foreach ($itemsdummy as $items) {
            $inventoryData = new Inventories();
            $inventoryData->inventoryID = $items->item_id;
            $inventoryData->instock = $items->instock;
            $inventoryData->outstock = 0;
            $inventoryData->date = $transactionDate;
            $inventoryData->transectionCode = "notYet";
            $inventoryData->cancel = 0;
            $inventoryData->status = "stock in";
            $inventoryData->CommonCode = "0";
            $inventoryData->save();
        }
        \DB::table('dummies')->truncate();
      
        $itemsdummy = \DB::select("select * from inventory_settings inner join dummies on inventory_settings.id=dummies.item_id order by dummies.id desc");

      
        return redirect()->back()->with('sucess', 'Added successfully');;
    }

    public function saveOutStock($transactionDate)
    {
        $itemsdummy = \DB::select("select * from dummy_seconds");

        foreach ($itemsdummy as $items) {
            $inventoryData = new Inventories();
            $inventoryData->inventoryID = $items->item_id;
            $inventoryData->instock = 0;
            $inventoryData->outstock = $items->instock;
            $inventoryData->date = $transactionDate;
            $inventoryData->transectionCode = "notYet";
            $inventoryData->cancel = 0;
            $inventoryData->status = "stock out";
            $inventoryData->CommonCode = "0";
            $inventoryData->save();
        }
        \DB::table('dummy_seconds')->truncate();
        //dd($itemsdummy);
        $itemsdummy = \DB::select("select * from inventory_settings inner join dummy_seconds on inventory_settings.id=dummy_seconds.item_id order by dummy_seconds.id desc");

        // return view('instock.stockIn', compact('itemsdummy'));
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     */
    public function show(Inventories $inventories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventories $inventories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventories $inventories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventories $inventories)
    {
        //
    }
}