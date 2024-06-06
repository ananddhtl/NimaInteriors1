<?php

namespace App\Http\Controllers;

use App\Models\TermandCondition;
use Illuminate\Http\Request;

class TermandConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data = TermandCondition::get();
    return view('backend.termandcondition.index', compact('data'));
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
            $data = new TermandCondition();
            $data->description = $validatedData['description'];
            $data->save();
            return redirect()->route('admin.listtermandcondition')->with('success', 'Data created successfully!');
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(TermandCondition $termandCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TermandCondition $termandCondition, $id)
    {
        
        $edittermandcondition = TermandCondition::findOrFail($id);
        $data = TermandCondition::get();
        return view('backend.termandcondition.index', compact('edittermandcondition','data'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TermandCondition $termandCondition, $id)
    {
       
        $validatedData = $request->validate([
            
            'description' => 'required',
        ]);

       
        $termandCondition = TermandCondition::findOrFail($id);
        $termandCondition->description = $validatedData['description'];
        $termandCondition->save();
        return redirect()->route('admin.listtermandcondition')->with('success', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TermandCondition $termandCondition)
    {
        //
    }
}