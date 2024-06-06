<?php

namespace App\Http\Controllers;
use App\Models\ItemGroup;
use App\Models\ItemSubGroup;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function todaytotalstock()
{
    $todaydate = \Carbon\Carbon::now()->toDateString();

    $reports = \DB::select("
        SELECT itemName, 
               SUM(instock) as inqty, 
               SUM(outstock) as ouqty, 
               SUM(instock) - SUM(outstock) as totalQty 
        FROM inventories 
        INNER JOIN inventory_settings 
        ON inventory_settings.id = inventories.inventoryID  
        WHERE inventories.date = ? 
        GROUP BY itemName
    ", [$todaydate]);

    return view('backend.reports.todaytotalstock', compact('reports'));
}
public function instock()
  {

    $reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventory_settings on inventories.inventoryID=inventory_settings.id where instock>0;");

    return view('backend.reports.instock', compact('reports'));

  }

  public function outstock()
  {

    $reports = \DB::select("SELECT * FROM `inventories` INNER JOIN inventory_settings on inventories.inventoryID=inventory_settings.id where outstock>0;");

    return view('backend.reports.outstock', compact('reports'));
  }

  public function groupwise()
  {

     $reports = ItemGroup::all();
    return view('backend.reports.groupwisestock', compact('reports'));
  }

  public function subgroupwise()
  {

     $reports = ItemGroup::all();
    return view('backend.reports.subgroupwisestock', compact('reports'));
  }

  public function singleitemgroupwisestock($id)
  {
      $reports = \DB::select("
          SELECT 
              itemName, 
              SUM(instock) AS inqty, 
              SUM(outstock) AS ouqty, 
              SUM(instock) - SUM(outstock) AS totalQty 
          FROM `inventories` 
          INNER JOIN inventory_settings ON inventory_settings.id = inventories.inventoryID 
          INNER JOIN item_groups ON inventory_settings.itemgroup_id = item_groups.id 
          WHERE inventory_settings.itemgroup_id = ? 
          GROUP BY itemName;
      ", [$id]);
  
      return view('backend.reports.singleitemgroupwisestock', compact('reports'));
  }
  


}