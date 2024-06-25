<?php

namespace App\Http\Controllers;

use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductImagesController extends Controller
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
            'commonCode_id' => 'required|exists:inventory_settings,id', 
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
       
        $commonCodeId = $request->input('commonCode_id');
        $images = $request->file('images');
    
        
        foreach ($images as $image) {
            
            $filename = time() . '_' . $image->getClientOriginalName();
    
           
            $image->move(public_path('admin/productimages'), $filename);
    
          
            $productImage = new ProductImages();
            $productImage->product_id = $commonCodeId;
        
            $productImage->images = 'admin/productimages/' . $filename;
            $productImage->save();
        }
    
       
        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductImages $productImages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductImages $productImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductImages $productImages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $image = ProductImages::findOrFail($id);


        if (file_exists(public_path($image->images))) {
            unlink(public_path($image->images));
        }


        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
