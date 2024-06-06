<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Blog;
use App\Models\TermandCondition;
use App\Models\PrivacyDeclaration;
use App\Models\InventorySettings;
use App\Models\ItemGroup;
use App\Models\ItemSubGroup;
use App\Models\ProductImages;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function project()
    {

        $projectlist = Project::get();
        return view('frontend.project', compact('projectlist'));
    }

    public function projectdesc($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('frontend.project-single', compact('project'));
    }

    public function blog()
    {
        $bloglist = Blog::get();

        return view('frontend.blog', compact('bloglist'));
    }


    public function blogsingledesc($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('frontend.blog-single', compact('blog'));
    }


    public function generaltermandcondition()
    {

        $data = TermandCondition::get();
        return view('frontend.termandcondition', compact('data'));
    }

    public function privacy()
    {

        $data = PrivacyDeclaration::get();
        return view('frontend.privacy', compact('data'));
    }

    public function languageSwitch(Request $request)
    {

        $language = $request->input('language');
        session(['language', $language]);
        return redirect()->back()->with(['language_switched' => $language]);
    }

    public function dashboard()
    {


        return view('frontend.customer.account.index');
    }
    public function getproducts()
    {
        $itemsdetails = InventorySettings::join('inventory_setting_details', 'inventory_settings.id', '=', 'inventory_setting_details.commonCode_id')
            ->orderBy('inventory_settings.id', 'asc')
            ->where('inventory_settings.status', '0')
            ->select('inventory_settings.id as item_id','inventory_settings.*', 'inventory_setting_details.*')
            ->paginate(10);

        $category = ItemGroup::all();
        $subcategory = ItemSubGroup::all();
        $brand = Brand::all();
        return view('frontend.shopping.gridshop', compact('itemsdetails', 'category', 'subcategory', 'brand'));
    }



    public function updateprofile()
    {


        return view('frontend.customer.account.profilesetting');
    }

    public function getproductsdesc($id)
    {
       
        $itemsdetails = InventorySettings::join('inventory_setting_details', 'inventory_settings.id', '=', 'inventory_setting_details.commonCode_id')
            ->orderBy('inventory_settings.id', 'asc')
            ->where('inventory_settings.status', '0')
            ->where('inventory_settings.id', $id)
            ->select('inventory_settings.*', 'inventory_setting_details.*')
            ->first();
dd($itemsdetails);
       
        $productimages = ProductImages::where('product_id', $id)->get();

      
        if (!$itemsdetails) {
            return redirect()->back()->with('error', 'Product details not found.');
        }

        return view('frontend.shopping.product-detail', compact('itemsdetails', 'productimages'));
    }


    public function password()
    {


        return view('frontend.customer.account.password');
    }


    public function update(Request $request)
    {




        $user = Auth::user();
        $user->fullname = $request->input('name');
        $user->gender = $request->input('gender');
        $user->phonenumber = $request->input('phonenumber');
        $user->dob = $request->input('dob');
        $user->save();


        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|string|min:8|confirmed',
        ]);
        if (!Hash::check($request->input('currentpassword'), Auth::user()->password)) {
            return redirect()->back()->withErrors(['currentpassword' => 'The current password is incorrect.']);
        }


        $user = Auth::user();
        $user->password = Hash::make($request->input('newpassword'));
        $user->save();


        return redirect()->back()->with('success', 'Password updated successfully.');
    }




}