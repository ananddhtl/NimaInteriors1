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
use App\Models\ProductDescription;
use App\Models\AddressBook;
use App\Models\FrontendHomepage;
use App\Models\Partner;
use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;

class FrontendController extends Controller
{
    public function homepage($locale)
    {
        $contactInfo = Brand::first();
        $homepagecontents = FrontendHomepage::with('carouselItems.project')->get();

        foreach ($homepagecontents as $content) {
            $content->title_translation = Translation::getTranslationByContent($content->title, App::getLocale());
            $content->content_translation = Translation::getTranslationByContent($content->content, App::getLocale());

            foreach ($content->carouselItems as $item) {
                $item->text_translation = Translation::getTranslationByContent($item->text, App::getLocale());
            }
        }

        return view('frontend.homepage', compact('locale','homepagecontents', 'contactInfo'));
    }
    public function contactus($locale)
    {
        $contactInfo = Brand::first();
        return view('frontend.contact', compact('locale','contactInfo'));
    }
    public function partner($locale)
    {

        return view('frontend.project', compact('locale','partners'));
    }

    public function translation()
    {
        // Retrieve all translations from the database
        $beTranslations = Translation::pluck('nl_be_translation', 'key')->toArray();
        $enTranslations = Translation::pluck('en_translation', 'key')->toArray();
        $nlTranslations = Translation::pluck('nl_translation', 'key')->toArray();
        return view('translations.index', compact('beTranslations', 'enTranslations'));
    }
    public function project($locale)
    {

        $contactInfo = Brand::first();
        $partners = Partner::all();
        $projectlist = Project::get();

        // Fetch translations for each project title and description based on current locale
        foreach ($projectlist as $project) {
            $project->title_translation = $project->getTitleTranslation(App::getLocale());
            $project->description_translation = $project->getDescriptionTranslation(App::getLocale());
        }

        return view('frontend.project', compact('locale','contactInfo', 'partners', 'projectlist'));
    }


    public function projectdesc($locale, $slug)
    {
        $contactInfo = Brand::first();
        $project = Project::with(['images' => function ($query) {
            $query->orderBy('position', 'asc');
        }])->where('slug', $slug)->firstOrFail();
        $project->title_translation = $project->getTitleTranslation($locale);
        return view('frontend.project-single', compact('project', 'contactInfo'));
    }


    public function blog()
    {
        $contactInfo = Brand::first();
        $bloglist = Blog::get();

        // Fetch translations for each project title and description based on current locale
        foreach ($bloglist as $blog) {
            $blog->title_translation = $blog->getTitleTranslation(App::getLocale());
            $blog->description_translation = $blog->getDescriptionTranslation(App::getLocale());
        }

        return view('frontend.blog', compact('bloglist', 'contactInfo'));
    }


    public function blogsingledesc($locale, $slug)
    {
        $contactInfo = Brand::first();
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $blog->title_translation = $blog->getTitleTranslation(App::getLocale());
        $blog->description_translation = $blog->getDescriptionTranslation(App::getLocale());

        return view('frontend.blog-single', compact('blog', 'contactInfo'));
    }


    public function generaltermandcondition()
    {

        $contactInfo = Brand::first();
        $data = TermandCondition::get();
        return view('frontend.termandcondition', compact('data', 'contactInfo'));
    }

    public function privacy()
    {

        $contactInfo = Brand::first();
        $data = PrivacyDeclaration::get();
        return view('frontend.privacy', compact('data', 'contactInfo'));
    }

    public function languageSwitch(Request $request)
    {


        $language = $request->input('language');
        session(['language', $language]);
        return redirect()->back()->with(['language_switched' => $language]);
    }

    public function dashboard($locale)
    {

        $contactInfo = Brand::first();

        return view('frontend.customer.account.index', compact('locale','contactInfo'));
    }

    public function getwishlist($locale)
    {
        $contactInfo = Brand::first();
        return view('frontend.customer.account.wishlist', compact('locale','contactInfo'));
    }
    public function getproducts($locale, Request $request)
    {
        $contactInfo = Brand::first();
        $category_id = $request->input('id'); // Retrieve category ID from the 'id' query parameter

        $itemsQuery = InventorySettings::join('inventory_setting_details', 'inventory_settings.id', '=', 'inventory_setting_details.commonCode_id')
            ->orderBy('inventory_settings.id', 'asc')
            ->where('inventory_settings.status', '1');


        if ($category_id) {
            $itemsQuery->where('inventory_settings.itemgroup_id', $category_id);
        }

        $itemsdetails = $itemsQuery->select('inventory_settings.id as item_id', 'inventory_settings.*', 'inventory_setting_details.*')
            ->paginate(10);

        $category = ItemGroup::all();
        $subcategory = ItemSubGroup::all();
        $brand = Brand::all();


        return view('frontend.shopping.gridshop', compact('locale', 'itemsdetails', 'category', 'subcategory', 'brand', 'contactInfo'));
    }

    public function updateprofile()
    {

        $contactInfo = Brand::first();
        return view('frontend.customer.account.profilesetting');
    }

    public function getproductsdesc($locale, $slug)
    {

        $contactInfo = Brand::first();

        $product = InventorySettings::where('slug', $slug)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }


        $itemsdetails = InventorySettings::join('inventory_setting_details', 'inventory_settings.id', '=', 'inventory_setting_details.commonCode_id')
            ->orderBy('inventory_settings.id', 'asc')
            ->where('inventory_settings.id', $product->id)
            ->select('inventory_settings.*', 'inventory_setting_details.*')
            ->first();


        $productimages = ProductImages::where('product_id', $product->id)->get();


        $productdesc = ProductDescription::where('product_id', $product->id)->get();


        $itemsdetails->addondetails = json_decode($itemsdetails->addondetails, true);


        $similarProducts = InventorySettings::join('inventory_setting_details', 'inventory_settings.id', '=', 'inventory_setting_details.commonCode_id')
            ->orderBy('inventory_settings.id', 'asc')
            ->where('inventory_settings.itemgroup_id', $itemsdetails->itemgroup_id)
            ->where('inventory_settings.id', '!=', $product->id)
            ->select('inventory_settings.id as item_id', 'inventory_settings.*', 'inventory_setting_details.*')
            ->take(5)
            ->get();


        $productsYouMayLike = InventorySettings::join('inventory_setting_details', 'inventory_settings.id', '=', 'inventory_setting_details.commonCode_id')
            ->orderBy('inventory_settings.id', 'asc')
            ->where('inventory_settings.id', '!=', $product->id)
            ->select('inventory_settings.id as item_id', 'inventory_settings.*', 'inventory_setting_details.*')
            ->take(5)
            ->get();


        return view('frontend.shopping.product-detail', compact('locale', 'itemsdetails', 'productimages', 'productdesc', 'similarProducts', 'productsYouMayLike', 'contactInfo'));
    }


    public function addToCart($locale, $id)
    {


        // Retrieve the product details based on the provided ID
        $product = InventorySettings::join('inventory_setting_details', 'inventory_settings.id', '=', 'inventory_setting_details.commonCode_id')
            ->orderBy('inventory_settings.id', 'asc')
            ->where('inventory_settings.id', $id)
            ->select('inventory_settings.*', 'inventory_setting_details.*')
            ->first();

        // Check if the product was found
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Retrieve the current cart from the session or create an empty array if the cart does not exist
        $cart = session()->get('cart', []);

        // If the product already exists in the cart, increase its quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Otherwise, add the product to the cart
            $cart[$id] = [
                "name" => $product->itemName,
                "quantity" => 1,
                "price" => $product->sellRate,
                "image" => $product->thumbnail,
                // "addon" => $firstAddon, // Addons can be added if necessary
            ];
        }

        // Save the cart back to the session
        session()->put('cart', $cart);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }



    private function addToCartWithDynamicParams(Request $request, $id)
    {

        $dynamicParams = $request->except(['_token', 'id']);
        $quantity = (int) $dynamicParams['quantity'] ?? 1;


        Log::info('Dynamic Params:', $dynamicParams);


        $product = InventorySettings::join('inventory_setting_details', 'inventory_settings.id', '=', 'inventory_setting_details.commonCode_id')
            ->orderBy('inventory_settings.id', 'asc')
            ->where('inventory_settings.id', $id)
            ->select('inventory_settings.*', 'inventory_setting_details.*')
            ->first();


        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }





        $itemKey = $id;


        $cart = session()->get('cart', []);


        if (isset($cart[$itemKey])) {
            $cart[$itemKey]['quantity'] += $quantity;
        } else {

            $cart[$itemKey] = [
                "name" => $product->itemName,
                "quantity" => $quantity,
                "price" => $product->sellRate,
                "image" => $product->thumbnail,
                "addon" => $dynamicParams
            ];
        }


        Log::info('Cart Before Save:', $cart);


        session()->put('cart', $cart);


        Log::info('Cart After Save:', session()->get('cart'));


        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }




    private function addToCartWithQuantityOnly($locale, Request $request, $id)
    {

        $product = InventorySettings::join('inventory_setting_details', 'inventory_settings.id', '=', 'inventory_setting_details.commonCode_id')
            ->orderBy('inventory_settings.id', 'asc')
            ->where('inventory_settings.id', $id)
            ->select('inventory_settings.*', 'inventory_setting_details.*')
            ->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        $addons = json_decode($product->addondetails, true);
        $firstAddon = reset($addons);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->itemName,
                "quantity" => 1,
                "price" => $product->sellRate,
                "image" => $product->thumbnail,
                "addon" => $firstAddon
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product Added to Cart Successfully');
    }
    public function remove(Request $request)
    {

        $id = $request->input('id');

        if ($id) {
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
                session()->flash('success', 'Product removed successfully');
            } else {
                session()->flash('error', 'Product not found in cart');
            }
        } else {
            session()->flash('error', 'Invalid request');
        }
        session()->flash('success', 'Item removed from successfully!');
        return redirect()->back();
    }

    public function clearCart($locale)
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared successfully');
    }

    public function updatecart($locale, Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;

        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);


            $subtotal = $cart[$id]['price'] * $quantity;
            $total = array_reduce($cart, function ($carry, $item) {
                return $carry + ($item['price'] * $item['quantity']);
            }, 0);

            return response()->json([
                'locale',
                'subtotal' => $subtotal,
                'total' => $total
            ]);
        }

        return response()->json(['error' => 'Item not found in cart'], 404);
    }



    public function password($locale)
    {

        $contactInfo = Brand::first();
        return view('frontend.customer.account.password', compact('contactInfo'));
    }

    public function cart($locale)
    {

        $contactInfo = Brand::first();
        return view('frontend.shopping.cart', compact('locale','contactInfo'));
    }
    public function wishlist($locale)
    {

        $contactInfo = Brand::first();
        return view('frontend.shopping.wishlist', compact('locale','contactInfo'));
    }

    public function checkout($locale,Request $request)
    {
        $contactInfo = Brand::first();

        if (Auth::check()) {
            $checkout = AddressBook::where('user_id', Auth::user()->id)->first();
            return view('frontend.shopping.checkout', compact('locale','checkout', 'contactInfo'));
        } else {
            // Store contactInfo in the session temporarily
            $request->session()->put('contactInfo', $contactInfo);
            return redirect()->route('customer.login', compact('locale'))
                ->with('success', 'Please Login First');
        }
    }




    public function update(Request $request)
    {

        $user = Auth::user();
        $user->fullname = $request->input('name');
        $user->gender = $request->input('gender');
        $user->phonenumber = $request->input('phonenumber');
        $user->dob = $request->input('dob');
        $user->save();

        session()->flash('success', 'User information updated  successfully');
        return redirect()->back();
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
        session()->flash('success', 'Password changed successfully');
        return redirect()->back();
    }
    public function show($type, $slug)
    {
        switch ($type) {

            case 'blog':
                $item = Blog::where('slug', $slug)->firstOrFail();
                return view('frontend.blog', compact('item'));
                break;
            case 'project':
                $item = Project::where('slug', $slug)->firstOrFail();
                return view('frontend.project', compact('item'));
                break;
            default:
                abort(404);
        }
    }
    public function searchresults(Request $request)
    {
        $contactInfo = Brand::first();
        $query = $request->input('query');

        $products = InventorySettings::join('inventory_setting_details', 'inventory_settings.id', '=', 'inventory_setting_details.commonCode_id')
            ->orderBy('inventory_settings.id', 'asc')
            ->where('inventory_settings.status', '1')
            ->where('inventory_settings.itemName', 'LIKE', '%' . $query . '%')
            ->get(['inventory_settings.itemName as title', 'inventory_settings.id', 'inventory_settings.slug', 'inventory_settings.thumbnail']);

        $blogs = Blog::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', "%. $query .%")
            ->get(['title', 'id', 'slug', 'description']);

        $projects = Project::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', "%. $query .%")
            ->get(['title', 'id', 'slug', 'description']);

        $pages = $blogs->merge($projects);
        $contactInfo = Brand::first();
        return view('frontend.searchresults', compact('products', 'pages', 'query', 'contactInfo'));
    }
}
