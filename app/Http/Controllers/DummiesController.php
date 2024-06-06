<?php

namespace App\Http\Controllers;

use App\Models\Dummies;
use Illuminate\Http\Request;

class DummiesController extends Controller
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
            $dummydata = Dummies::find($request->id);
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
            return redirect('/stockin')->with('itemdetails', 'Item details  updated successfully');
        } else {

            $unitEqualsTo = $request->unitEqualsTo;
            $quantity = $request->quantity;
            $bonus = $request->bonus;
            $totalinstock =  $quantity;
            $dummydata = new Dummies();
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
    public function show(Dummies $dummies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dummies $dummies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dummies $dummies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dummies $dummies)
    {
        //
    }
}