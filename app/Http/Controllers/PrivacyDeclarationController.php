<?php

namespace App\Http\Controllers;

use App\Models\PrivacyDeclaration;
use Illuminate\Http\Request;

class PrivacyDeclarationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PrivacyDeclaration::get();
        return view('backend.privacydeclaration.index', compact('data'));
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
                'description' => 'required',
            ]);
            $data = new PrivacyDeclaration();
            $data->description = $validatedData['description'];
            $data->save();
            return redirect()->route('admin.listprivacydeclaration')->with('success', 'Data created successfully!');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(PrivacyDeclaration $privacyDeclaration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrivacyDeclaration $privacyDeclaration, $id)
    {
        $editprivacydeclaration = PrivacyDeclaration::findOrFail($id);
        $data = PrivacyDeclaration::get();
        return view('backend.privacydeclaration.index', compact('editprivacydeclaration','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrivacyDeclaration $privacydeclaration, $id)
    {
      
        $validatedData = $request->validate([
            'description' => 'required',
        ]);
    
      
        $privacydeclaration = PrivacyDeclaration::findOrFail($id);
    
       
        $privacydeclaration->description = $validatedData['description'];
    
      
        $privacydeclaration->save();
    
        
        return redirect()->route('admin.listprivacydeclaration')->with('success', 'Data updated successfully!');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrivacyDeclaration $privacyDeclaration)
    {
        //
    }
}