<?php

namespace App\Http\Controllers;

use App\Models\AddonCategory;
use Illuminate\Http\Request;

class AddonCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AddonCategory::get();
        return view('backend.addoncategory.add', compact('data'));
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

            if ($request->addoncategory_edit) {
                $addoncategory = AddonCategory::find($request->group_idEdit);
                $addoncategory->title = $request->title;
                $addoncategory->update();
                return redirect()->route('admin.addonitemcatgeory')->with('success', 'Project created successfully!');
            } else {
                $request->validate(['title' => 'required|unique:addon_categories']);
                $addoncategory = new AddonCategory();
                $addoncategory->title = $request->title;
                $addoncategory->status = 0;
                $addoncategory->save();
                $data = AddonCategory::orderBy("id", "desc")->take(10)->where('status', '0')->get();

                return redirect()->back()->with('sucess', 'Add on category successfully');

            }

    }

    /**
     * Display the specified resource.
     */
    public function show(AddonCategory $addonCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddonCategory $addonCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddonCategory $addonCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddonCategory $addonCategory)
    {
        //
    }
}