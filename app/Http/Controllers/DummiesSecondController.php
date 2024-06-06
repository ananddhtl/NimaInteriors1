<?php

namespace App\Http\Controllers;

use App\Models\DummySecond;
use Illuminate\Http\Request;

class DummySecondController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'itemId' => 'required',
            'quantity' => 'required',

        ]);
        if ($request->id) {

            $unitEqualsTo = $request->unitEqualsTo;
            $quantity = $request->quantity;
            $bonus = $request->bonus;
            $totalinstock =$quantity;
            $dummydata = DummySecond::find($request->id);
            $dummydata->item_id = $request->itemId;
            $dummydata->instock =  $totalinstock;
            $dummydata->outstock = 0;
            $dummydata->units = $request->Unit;
            $dummydata->rate = $request->Rate;
            $dummydata->unitEqualsTo = $unitEqualsTo;
            $dummydata->bonus = $bonus;
            $dummydata->quantity = $quantity;
            $dummydata->date = "1900-01-01";
            $dummydata->update();
            return redirect('/stockOut')->with('itemdetails', 'Item details  updated successfully');
        } else {



            $unitEqualsTo = $request->unitEqualsTo;
            $quantity = $request->quantity;
            $bonus = $request->bonus;
            $totalinstock =$quantity;
            $dummydata = new DummySecond();
            $dummydata->item_id = $request->itemId;
            $dummydata->instock =  $totalinstock;
            $dummydata->outstock = 0;
            $dummydata->units = $request->Unit;
            $dummydata->rate = $request->Rate;
            $dummydata->unitEqualsTo = $unitEqualsTo;
            $dummydata->bonus = $bonus;
            $dummydata->quantity = $quantity;
            $dummydata->date = "1900-01-01";
            $dummydata->save();
            return redirect()->back()->with('itemdetails', 'Item details  added successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DummySecond $dummySecond)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DummySecond $dummySecond)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DummySecond $dummySecond)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DummySecond $dummySecond)
    {
        //
    }
}