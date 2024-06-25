<?php

namespace App\Http\Controllers;

use App\Models\ItemGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ItemGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ItemGroup::orderBy("id", "desc")->take(10)->get();
        return view('backend.inventory.itemgroup', compact('data'));
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
        $item = ItemGroup::find($request->id);
        if ($item) {
            $item->status = $request->status;
            $item->save();
            return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
    }
    
    if ($request->group_idEdit) {
        $group = ItemGroup::find($request->group_idEdit);
        $group->groupName = $request->groupName;
        $group->update();
        return redirect()->route('admin.itemgroup')->with('success', 'Group "' . $request->groupName . '" updated successfully!');
    } else {
        $request->validate(['groupName' => 'required|unique:item_groups']);
       
        $group = new ItemGroup();
        $group->groupName = $request->groupName;
        $group->status = $request->status;
        $group->save();
        $groupitems = ItemGroup::orderBy("id", "desc")->take(10)->where('status', '0')->get();

        return redirect()->back()->with('success', 'Group "' . $request->groupName . '" added successfully');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(ItemGroup $itemGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = ItemGroup::orderBy("id", "desc")->take(10)->get();
        $group = ItemGroup::FindorFail($id);
        return view('backend.inventory.itemgroup', compact('group', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemGroup $itemGroup)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
           
            DB::table('item_sub_groups')->where('item_group_id', $id)->delete();

          
            DB::table('item_groups')->where('id', $id)->delete();
        });

        return redirect()->back()->with('success', 'Item group and related subgroups deleted successfully.');
    }

    public function SearchGroup(Request $request)
    {

        if ($request->ajax()) {
            $search = $request->get('query');
            if ($search != '') {
                $groupitems = ItemGroup::where('groupName', 'LIKE', '' . $search . '%')->take(10)->get();
            }
        }
        return json_encode($groupitems);

    }
}