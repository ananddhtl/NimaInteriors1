<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $data=Brand::orderBy("id","desc")->take(10)->get();
       return view('backend.inventory.brand',compact('data'));
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
    if ($request->ajax()) {
           
        $item = Brand::find($request->id);
        if ($item) {
            $item->status = $request->status;
            $item->save();
            return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
    }
    if($request->id)
    { 
        $request->validate([
            'companyName' => 'required',
            'address' => 'required',
            'contactNumber' => 'required',
        ]);

        $company = Brand::find($request->id);                
        $company->companyName = $request->companyName; 
        $company->address = $request->address;      
        $company->contactNumber = $request->contactNumber;  
        $company->update();
        
        return redirect()->back()->with('company_updated', $request->companyName . ' is successfully updated'); 
    }
    else
    {
        $request->validate([
            'companyName' => 'required|unique:brands',
            'address' => 'required',
            'contactNumber' => 'required|unique:brands',
        ]);

        $company = new Brand();
        $company->companyName = $request->companyName; 
        $company->address = $request->address;      
        $company->contactNumber = $request->contactNumber; 
        $company->status = 0;           
        $company->save();
        
        return redirect()->back()->with('company_added', $request->companyName . ' added successfully');     
    }   
}



    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand, $id)
    {
        $data = Brand::orderBy("id","desc")->where('status','0')->take(10)->get();
        $editbrand=Brand::FindorFail($id);
        return view('backend.inventory.brand',compact('data','editbrand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand, $id)
    {
        $company=Brand::findorfail($id);  
           
        $company->delete();
        return back()->with('message','Brand is delete successfully');
    }
}