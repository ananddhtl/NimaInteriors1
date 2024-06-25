<?php

namespace App\Http\Controllers;

use App\Models\InventorySettings;
use App\Models\InventorySettingDetails;
use App\Models\ItemGroup;
use App\Models\ItemSubGroup;
use App\Models\AddonCategory;
use App\Models\Brand;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use App\Models\ProductDescription;
use Illuminate\Support\Str;

class InventorySettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemsdetails = InventorySettings::orderBy("id", "asc")->paginate(10);

        $itemgroup = ItemGroup::all();

        $itemsubgroup = ItemSubGroup::all();
      
        $brand = Brand::all();
        return view('backend.inventory.items', compact('itemsdetails', 'itemgroup','itemsubgroup', 'brand'));
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
            'itemName' => 'required',
            'itemgroup_id' => 'required',
            'itemDetails' => 'required',
            'units' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

       
        $slug = Str::slug($request->itemName, '-');

        if ($request->itemEditId) {
            $itemsupdate = InventorySettings::find($request->itemEditId);
            $itemsupdate->itemName = $request->itemName;
            $itemsupdate->itemDetails = $request->itemDetails;
            $itemsupdate->itemgroup_id = $request->itemgroup_id;
            $itemsupdate->sub_groups_id = $request->sub_groups_id;
            $itemsupdate->company_id = $request->company_id;
            $itemsupdate->units = $request->units;
            $itemsupdate->slug = $slug; 

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $img_name = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move('uploads/itemsettings/thumbnail/', $img_name);
                $save_url = '/uploads/itemsettings/thumbnail/' . $img_name;
                $itemsupdate->thumbnail = $save_url;
            }
            $itemsupdate->update();
            return back()->with('itemsdetails_updated', 'Group Item is successfully updated');
        } else {
            $itemsdetails = new InventorySettings();
            $itemsdetails->itemName = $request->itemName;
            $itemsdetails->itemDetails = $request->itemDetails;
            $itemsdetails->itemgroup_id = $request->itemgroup_id;
            $itemsdetails->sub_groups_id = $request->sub_groups_id;
            $itemsdetails->delivery_estimation_time = $request->delivery_estimation_time;
            $itemsdetails->company_id = $request->company_id;
            $itemsdetails->units = $request->units;
            $itemsdetails->slug = $slug; 

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $img_name = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move('uploads/itemsettings/thumbnail/', $img_name);
                $save_url = '/uploads/itemsettings/thumbnail/' . $img_name;
                $itemsdetails->thumbnail = $save_url;
            }

            $itemsdetails->save();
            return redirect()->back()->with('itemdetails', 'Item details added successfully');
        }
    }


    public function additemunitdetails($id)
    {

        $itemsdetail = InventorySettings::findOrFail($id);
    
       
        $itemsgroupDetails = ItemGroup::where('id', $itemsdetail->itemgroup_id)->first();
       
        $itemssubgroupdetails = ItemSubGroup::where('id', $itemsdetail->sub_groups_id)->first();
        $itemscompanydetails = Brand::where('id', $itemsdetail->company_id)->first();
    
       
        $addoncategory = AddonCategory::get();
        
        $itemsunitdetails = InventorySettingDetails::where('commonCode_id', $id)->orderBy('id', 'desc')->first();
        
        return view('backend.inventory.itemunits', compact('itemsunitdetails', 'itemsdetail', 'itemsgroupDetails', 'itemssubgroupdetails', 'itemscompanydetails', 'addoncategory'));
    }


    public function viewitemdetails(Request $request, $id)
    {
      
        $itemsdetail = InventorySettings::findOrFail($id);
    
       
        $itemsgroupDetails = ItemGroup::where('id', $itemsdetail->itemgroup_id)->first();
       
        $itemssubgroupdetails = ItemSubGroup::where('id', $itemsdetail->sub_groups_id)->first();
        $itemscompanydetails = Brand::where('id', $itemsdetail->company_id)->first();
    
       
        $addoncategory = AddonCategory::get();
        $productimages = ProductImages::where('product_id', $id)->get()->groupBy('product_id');
        $itemsunitdetails = InventorySettingDetails::where('commonCode_id', $id)->orderBy('id', 'desc')->first();
    
      
        return view('backend.inventory.viewitemdetails', compact('itemsunitdetails', 'itemsdetail', 'itemsgroupDetails', 'itemssubgroupdetails', 'itemscompanydetails', 'addoncategory', 'productimages'));
    }
    



    /**
     * Display the specified resource.
     */
    public function storeaddonitems(Request $request, InventorySettings $inventorySettings)
    {
        $request->validate([
            'commonCode_id' => 'required',
            'addonItems' => 'required|array',
        ]);

        $commonCodeId = $request->commonCode_id;
        $addonItems = $request->addonItems;

        
        $groupedItems = [];
        foreach ($addonItems as $item) {
            $categoryId = $item['category'];
            $groupedItems[$categoryId][] = $item['title'];
        }

        
        $addonItemsJson = json_encode($groupedItems);

       
        $inventorySetting = InventorySettings::find($commonCodeId);

        
        $inventorySetting->addondetails = $addonItemsJson;
        $inventorySetting->save();

        return response()->json(['success' => 'Addon items saved successfully']);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventorySettings $inventorySettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InventorySettings $inventorySettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventorySettings $inventorySettings)
    {
        
    }

    public function inventorysettingStore(Request $request)
    {



        // if ($request->unit_status == 0) {
        // }
        // else
        // {

        // }

        $data = InventorySettingDetails::where('status', '=', '0')
            ->where('commonCode_id', '=', $request->commonCode_id)
            ->where('altUnits', '=', $request->Alunits)
            ->first();

        if ($data != null) {


            return redirect()->back()->with('itemAlreadyExist', 'This unit is already exist.');
        } else {

            $itemsettings = new InventorySettingDetails();
            $itemsettings->unitStatus = $request->unit_status;
            $itemsettings->altUnits = $request->Alunits;
            $itemsettings->whereQty = $request->whereQty;
            $itemsettings->sellrate = $request->sellrate;
            $itemsettings->equals = $request->equals;
            $itemsettings->buyrate = $request->buyrate;
            $itemsettings->mrp = $request->mrp;
            $itemsettings->discountPercent = $request->dis;
            $itemsettings->commonCode_id = $request->commonCode_id;

            $itemsettings->save();
            return redirect()->back()->with('itemsettingsstore', 'Item Setting details  added successfully');
        }
    }

    public function stockin(InventorySettings $inventorySettings)
    {
        $itemsdummy = \DB::select("select * from inventory_settings inner join dummies on inventory_settings.id=dummies.item_id order by dummies.id desc");
        return view('backend.inventory.stockin', compact('itemsdummy'));
    }

    public function stockout(InventorySettings $inventorySettings)
    {
        $itemsdummy = \DB::select("select * from inventory_settings inner join dummy_seconds on inventory_settings.id=dummy_seconds.item_id order by dummy_seconds.id desc");

        return view('backend.inventory.stockout', compact('itemsdummy'));
    }

    public function searchforstockitem(Request $request)
    {
        if ($request->ajax()) {
            // dd('request is submitted');
            $search = $request->get('query');
            if ($search != '') {

                $items = \DB::select("select inventory_settings.id,itemName,altUnits,equals,buyRate,sellRate from inventory_settings inner join inventory_setting_details on inventory_settings.id=inventory_setting_details.commonCode_id where itemName like '" . $search . "%' and inventory_settings.status=0 and inventory_setting_details.status=0 limit 5");

                // $items = Inventorysetting::where('itemName', 'LIKE', '' . $search . '%')->where('status', '0')->take(10)->get();
            }
        }

        return json_encode($items);
    }
    public function updateitemstatus(Request $request, InventorySettings $inventorySettings)
    {
        $id = $request->id;

        $productimages = ProductImages::where('product_id', $id)->get();
        if ($productimages->isEmpty()) {
            return response()->json(['error' => 'Product images not found'], 404);
        }

        $itemrates = InventorySettingDetails::where('commonCode_id', $id)->get();
        if ($itemrates->isEmpty()) {
            return response()->json(['error' => 'Item rates not found'], 404);
        }

        $productDescriptions = ProductDescription::where('product_id', $id)->get();
        if ($productDescriptions->isEmpty()) {
            return response()->json(['error' => 'Product descriptions not found'], 404);
        }

        $inventorySetting = InventorySettings::find($id);
        if (!$inventorySetting) {
            return response()->json(['error' => 'Inventory setting not found'], 404);
        }

        if ($inventorySetting->addondetails === null) {
            return response()->json(['error' => 'Addon value is null, status not updated'], 400);
        }

        $inventorySetting->status = 1;
        $inventorySetting->save();

        return response()->json(['success' => 'All items found and processed successfully']);
    }
}