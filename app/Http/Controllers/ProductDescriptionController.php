<?php

namespace App\Http\Controllers;

use App\Models\ProductDescription;
use Illuminate\Http\Request;

class ProductDescriptionController extends Controller
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
        {
        
            $validatedData = $request->validate([
                "title"=> "required",
                "commonCode_id"=> "required",
                'description' => 'required',
            ]);
            $data = new ProductDescription();
            $data->product_id = $validatedData['commonCode_id'];
            $data->title = $validatedData['title'];
            $data->description = $validatedData['description'];
            $data->save();
            return redirect()->back()->with('success', 'Data created successfully!');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductDescription $productDescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductDescription $productDescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductDescription $productDescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductDescription $productDescription)
    {
        //
    }
}