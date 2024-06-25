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
        $brands = Brand::orderBy("id", "desc")->take(10)->get();
        return view('backend.inventory.brand', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $request->validate([
            'companyName' => 'required|unique:brands',
            'address' => 'required',
            'contactNumber' => 'required|unique:brands',
            'email' => 'required|email|max:255',
        ]);

        $company = new Brand();
        $company->companyName = $request->input('companyName'); 
        $company->address = $request->input('address');      
        $company->contactNumber = $request->input('contactNumber'); 
        $company->email = $request->input('email'); 
        $company->status = 0;           
        $company->save();
        
        return redirect()->route('admin.addbrand')->with('company_added', $request->input('companyName') . ' added successfully');     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brands = Brand::orderBy("id","desc")->where('status','0')->take(10)->get();
        $editbrand=Brand::FindorFail($id);
        return view('backend.inventory.editbrand',compact('brands','editbrand'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
         $request->validate([
             'companyName' => 'required|unique:brands,companyName,'.$id,
             'address' => 'required',
             'contactNumber' => 'required|unique:brands,contactNumber,'.$id,
             'email' => 'required|email|max:255',
         ]);
 
         $brand = Brand::find($id);
         $brand->companyName = $request->input('companyName');
         $brand->address = $request->input('address');
         $brand->contactNumber = $request->input('contactNumber');
         $brand->email = $request->input('email');
         $brand->save();
 
         return redirect()->route('admin.addbrand')->with('company_updated', 'Company updated successfully!');
     }
     public function updatestatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        $company = Brand::findOrFail($id);
        $company->status = $status;
        $company->save();

        return response()->json(['message' => 'Status updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = Brand::findOrFail($id);  
        $company->delete();
        return back()->with('message', 'Brand is deleted successfully');
    }
}
