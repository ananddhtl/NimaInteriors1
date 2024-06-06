<?php

namespace App\Http\Controllers;

use App\Models\ItemSubGroup;
use Illuminate\Http\Request;

class ItemSubGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subgroupitems=ItemSubGroup::with('ItemGroup')->orderBy('id','DESC')->where('status','0')->take(10)->get();
        return view('backend.inventory.itemsubgroup', compact('subgroupitems'));
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
           
            $item = itemSubGroup::find($request->id);
            if ($item) {
                $item->status = $request->status;
                $item->save();
                return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
            }
            return response()->json(['success' => false, 'message' => 'Item not found.'], 404);
        }  
     if($request->itemgroup_id!="" && $request->itemSubgroup_idEdit=="")
        {      
        $request->validate(['subGroupName' => 'required',
                        'itemgroup_id'=>'required'
                                         ]);
        $subgroup = new itemSubGroup();
        $subgroup->subGroupName =$request->subGroupName;      
        $subgroup->item_group_id =$request->itemgroup_id;      
        $subgroup->save();
        return redirect()->back()->with('success','Sub Group Item   added successfully');  
        
       }
    elseif( $request->itemgroup_id!="" && $request->itemSubgroup_idEdit!="")
       {     
           $request->validate(['subGroupName' => 'required',
                                'itemgroup_id'=>'required'
                           ]);
     
                         

            $subgroup=itemSubGroup::find($request->itemSubgroup_idEdit);      
            $subgroup->subGroupName=$request->subGroupName;     
            $subgroup->item_group_id=$request->itemgroup_id;    
            $subgroup->update();
            return redirect()->back()->with('subgroup_updated','Group Item  is successfully updated');
       }
           else{      
                return redirect()->back()->with('selectgroup','Please select the  Group first!');
       }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemSubGroup $itemSubGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemSubGroup $itemSubGroup, $id)
    {
        $subgroupitems=ItemSubGroup::with('ItemGroup')->orderBy('id','DESC')->where('status','0')->take(10)->get();
        $subgroup = ItemSubGroup::FindorFail($id);
        return view('backend.inventory.itemsubgroup', compact('subgroup', 'subgroupitems'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ItemSubGroup $itemSubGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ItemSubGroup $itemSubGroup, $id)
    {
        $subgroup  =ItemSubGroup::find($id);  
        $subgroup ->status =1;    
        $subgroup->update();
        return redirect()->back()->with('message','Group Item  is successfully updated');
    }

    public function SearchSubGroup(Request $request)
    {  
    
        if($request->ajax())
        {  
          
            $searchkey= $request->get('subgroupName');
            $groupId= $request->get('groupId');
            if($searchkey !='')
            {
                $data=ItemSubGroup::where ( 'subGroupName', 'LIKE', '' . $searchkey . '%' )->where ( 'item_group_id', '=', $groupId )->take(10)->get();    
            }
            
        }
 
        return json_encode($data);

    
     
    }
}