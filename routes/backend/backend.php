<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectImagesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TermandConditionController;
use App\Http\Controllers\PrivacyDeclarationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemGroupController;
use App\Http\Controllers\ItemSubGroupController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\InventorySettingsController;
use App\Http\Controllers\DummiesController;
use App\Http\Controllers\DummySecondController;
use App\Http\Controllers\InventoriesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AddonCategoryController;
use App\Http\Controllers\AddonItemController;
use App\Http\Controllers\ProductImagesController;
use App\Http\Controllers\NormalUserController;
use App\Models\ProductImages;


Route::get('admin/login', [AdminController::class, 'showloginform'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('adminlogin');

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('contactusdata', [ContactUsController::class, 'index'])->name('admin.contactusdata');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('addproject', [ProjectController::class, 'addproject'])->name('admin.addproject');
    Route::get('listproject', [ProjectController::class, 'index'])->name('admin.listproject');
    Route::get('editproject/{id}', [ProjectController::class, 'edit'])->name('admin.editproject');
    Route::post('storeproject', [ProjectController::class, 'store'])->name('admin.storeproject');

    Route::get('addprojectimages', [ProjectImagesController::class, 'addprojectimages'])->name('admin.addprojectimages');
    Route::get('listprojectimages', [ProjectImagesController::class, 'index'])->name('admin.listprojectimages');
    Route::post('storeprojectimages', [ProjectImagesController::class, 'store'])->name('admin.storeprojectimages');
    Route::delete('delete-image/{id}', [ProjectImagesController::class, 'destroy'])->name('admin.destroyproductimages');



    Route::get('addblog', [BlogController::class, 'addblog'])->name('admin.addblog');
    Route::get('listblog', [BlogController::class, 'index'])->name('admin.listblog');
    Route::get('editblog/{id}', [BlogController::class, 'edit'])->name('admin.editblog');
    Route::get('deleteblog/{id}', [BlogController::class, 'destroy'])->name('admin.deleteblog');
    Route::post('updateblog/{id}', [BlogController::class, 'update'])->name('admin.updateblog');
    Route::post('storeblog', [BlogController::class, 'store'])->name('admin.storeblog');

    Route::get('termandcondition', [TermandConditionController::class, 'index'])->name('admin.listtermandcondition');
    Route::get('edittermandcondition/{id}', [TermandConditionController::class, 'edit'])->name('admin.edittermandcondition');
    Route::post('storetermandcondition', [TermandConditionController::class, 'store'])->name('admin.storetermandcondition');
    Route::post('updatetermandcondition/{id}', [TermandConditionController::class, 'update'])->name('admin.updatetermandcondition');

    Route::get('privacydeclaraion', [PrivacyDeclarationController::class, 'index'])->name('admin.listprivacydeclaration');
    Route::post('storeprivacydeclaration', [PrivacyDeclarationController::class, 'store'])->name('admin.storeprivacydeclaration');
    Route::get('editprivacydeclaration/{id}', [PrivacyDeclarationController::class, 'edit'])->name('admin.editprivacydeclaration');
    Route::post('updateprivacydeclaration/{id}', [PrivacyDeclarationController::class, 'update'])->name('admin.updateprivacydeclaration');


    Route::get('itemsgroup', [ItemGroupController::class, 'index'])->name('admin.itemgroup');
    Route::post('storeitemgroup', [ItemGroupController::class, 'store'])->name('admin.storegroup');
    Route::get('editgroupname/{id}', [ItemGroupController::class, 'edit'])->name('admin.editgroupname');
    Route::get('deletegroupname/{id}', [ItemGroupController::class, 'destroy'])->name('admin.deletegroupname');

    Route::get('itemssubgroup', [ItemSubGroupController::class, 'index'])->name('admin.itemsubgroup');
    Route::post('storeitemsubgroup', [ItemSubGroupController::class, 'store'])->name('admin.storesubgroup');
    Route::get('/searchgroup', [ItemGroupController::class, 'SearchGroup'])->name('admin.searchgroup');
    Route::get('editsubgroupname/{id}', [ItemSubGroupController::class, 'edit'])->name('admin.editsubgroupname');
    Route::get('deletesubgroupname/{id}', [ItemSubGroupController::class, 'destroy'])->name('admin.deletesubgroupname');

    Route::get('brands', [BrandController::class, 'index'])->name('admin.addbrand');
    Route::post('storebrand', [BrandController::class, 'store'])->name('admin.storebrand');
    Route::get('editbrand/{id}', [BrandController::class, 'edit'])->name('admin.editbrand');
    Route::get('deletebrand/{id}', [BrandController::class, 'destroy'])->name('admin.deletebrand');

    Route::get('items', [InventorySettingsController::class, 'index'])->name('admin.items');

   
    Route::get(
        '/additemunitdetails/{id}',
        [InventorySettingsController::class, 'additemunitdetails']
    )
        ->name('admin.addunitdetails');

   
    Route::get(
        '/viewitemdetails/{id}',
        [InventorySettingsController::class, 'viewitemdetails']
    )
        ->name('admin.viewitemdetails');

    
    Route::get(
        '/delete-itemsDetails/{id}',
        [InventorySettingsController::class, 'deleteItemDetails']
    )
        ->name('admin.deleteitemdetails');

    Route::post('items', [InventorySettingsController::class, 'store'])->name('admin.storeitemssetting');
    Route::post('storeitems', [InventorySettingsController::class, 'storeaddonitems'])->name('admin.storeaddonitems');
    Route::post('inventorysettingsdetails', [InventorySettingsController::class, 'inventorysettingStore'])->name('admin.storeitemssettingdetails');
    Route::get('searchsubgroup', [ItemSubGroupController::class, 'searchsubgroup'])->name('admin.searchsubgroup');


    Route::get('stockin', [InventorySettingsController::class, 'stockin'])->name('admin.stockin');
    Route::get('stockout', [InventorySettingsController::class, 'stockout'])->name('admin.stockout');
    Route::get('/searchforstockitem', [InventorySettingsController::class, 'searchforstockitem'])->name('admin.searchforstockitem');

    Route::post('itemdummies', [DummiesController::class, 'store'])->name('admin.storedummies');
    Route::post('itemdummiessecond', [DummySecondController::class, 'store'])->name('admin.storedummiessecond');


    Route::get('stockin/save/{transactionDate}', [InventoriesController::class, 'store']);
    Route::get('stockout/save/{transactionDate}', [InventoriesController::class, 'saveOutStock']);


    Route::get('/todaystockreport', [ReportController::class, 'todaytotalstock'])->name('admin.todaytotalstock');
    Route::get('/instockreport', [ReportController::class, 'instock'])->name('admin.instock');
    Route::get('/outstockreport', [ReportController::class, 'outstock'])->name('admin.outstock');
    Route::get('/groupwise', [ReportController::class, 'groupwise'])->name('admin.groupwise');
    Route::get('/subgroupwise', [ReportController::class, 'subgroupwise'])->name('admin.subgroupwise');
    Route::get('/singleitemgroupwisestock/{id}', [ReportController::class, 'singleitemgroupwisestock']);

    Route::get('addonitemcatgeory', [AddonCategoryController::class, 'index'])->name('admin.addonitemcategory');
    Route::get('addonitem', [AddonItemController::class, 'index'])->name('admin.addonitem');
    Route::post('storeaddonitemcatgeory', [AddonCategoryController::class, 'store'])->name('admin.storeaddonitemcategory');
    Route::post('storeaddonitem', [AddonItemController::class, 'store'])->name('admin.storeaddonitem');
    Route::get('/get-addon-items', [AddonItemController::class, 'getAddonItems'])->name('admin.getaddonitems');

    Route::post('/storeproductimages', [ProductImagesController::class, 'store'])->name('admin.storeitemsimage');
    Route::delete('/productimages/{id}', [ProductImagesController::class, 'destroy'])->name('productimages.destroy');
    Route::get('/normalusers', [NormalUserController::class, 'index'])->name('admin.listnormausers');

});