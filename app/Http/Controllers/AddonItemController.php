<?php

namespace App\Http\Controllers;

use App\Models\AddonItem;
use App\Models\AddonCategory;
use Illuminate\Http\Request;

class AddonItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = AddonItem::get();
        $category = AddonCategory::get();
        return view('backend.addonitem.add', compact('data','category'));
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


            if ($request->addonitem_edit) {
                $addonitem = AddonItem::find($request->addonitem_edit);
                $addonitem->title = $request->title;
                $addonitem->category_id = $request->category_id;
                $addonitem->title = $request->title;
                $addoncategory->update();
                return redirect()->route_with_locale('admin.addonitemcatgeory')->with('success', 'Project created successfully!');
            } else {
                $request->validate(['title' => 'required|unique:addon_categories','category_id' => 'required']);
                $addoncategory = new AddonItem();
                $addoncategory->title = $request->title;
                $addoncategory->price = $request->price;
                $addoncategory->addoncategory_id = $request->category_id;
                $addoncategory->status = 0;
                $addoncategory->save();
                $data = AddonItem::orderBy("id", "desc")->take(10)->where('status', '0')->get();

                return redirect()->back()->with('sucess', 'Add on category successfully');

            }

    }

    public function getAddonItems(Request $request)
    {
    $categoryId = $request->input('category_id');
    $addonItems = AddonItem::where('addoncategory_id', $categoryId)->get(['id', 'title','price']); 

    return response()->json($addonItems);
    }

    /**
     * Display the specified resource.
     */
    public function show(AddonItem $addonItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AddonItem $addonItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AddonItem $addonItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AddonItem $addonItem)
    {
        //
    }
}