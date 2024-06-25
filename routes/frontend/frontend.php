<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NormalUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EmailController;
use App\Models\Brand;

use Illuminate\Http\Request;


Route::middleware(['set.language'])->group(function () {
    Route::prefix('{locale}')->group(function () {

        Route::prefix('customer')->group(function () {

            Route::get('/login', function ($locale,Request $request) {
                $contactInfo = Brand::first();
            
                return view('frontend.customer.login', compact('locale','contactInfo'));
            })->name('customer.login');

            Route::get('/register', function ($locale, Request $request) {
                $contactInfo = Brand::first();
                return view('frontend.customer.register', compact('locale','contactInfo'));
            })->name('customer.register');

            Route::get('/forgetpassword', function ($locale,Request $request) {
                $contactInfo = Brand::first();
                return view('frontend.customer.forgotpassword', compact('locale','contactInfo'));
            })->name('customer.forgotpassword');

            Route::get('/changepassword', function ($locale,Request $request) {
                $contactInfo = Brand::first();
                return view('frontend.customer.changepassword', compact('locale','contactInfo'));
            })->name('customer.changepassword');

            Route::post('login', [NormalUserController::class, 'login'])->name('customer.login.post');
            Route::post('storenormaluser', [NormalUserController::class, 'store'])->name('customer.normaluserdata');
            Route::get('dashboard', [NormalUserController::class, 'dashboard'])->name('customer.dashboard');
            Route::post('/logout', [NormalUserController::class, 'logout'])->name('customer.logout');
            Route::post('/forgot-password', [NormalUserController::class, 'forgotPassword'])->name('customer.forgot.password');
            Route::post('/change-password', [NormalUserController::class, 'changePassword'])->name('customer.change.password');
        });

        // Route::get('contacten', function () {
        //     return view('frontend.contact');
        // })->name('frontend.contact');
        Route::get('contacten', [FrontendController::class, 'contactus'])->name('frontend.contact');
        Route::post('contactusform', [ContactUsController::class, 'store'])->name('contactform');

        Route::get('projecten', [FrontendController::class, 'project'])->name('projectlist');
        Route::get('projecten/{slug}', [FrontendController::class, 'projectdesc'])->name('projectdesc');

        Route::get('blog', [FrontendController::class, 'blog'])->name('bloglist');
        Route::get('blog/{slug}', [FrontendController::class, 'blogsingledesc'])->name('blogsinglelist');

        Route::get('algemene-voorwaarden', [FrontendController::class, 'generaltermandcondition'])->name('generaltermandcondition');

        Route::get('privacy', [FrontendController::class, 'privacy'])->name('privacy');

        Route::middleware(['auth:web'])->prefix('customer')->group(function () {
            Route::get('dashboard', [FrontendController::class, 'dashboard'])->name('dashboard');
            Route::get('updateprofile', [FrontendController::class, 'updateprofile'])->name('profile');
            Route::get('updatepassword', [FrontendController::class, 'password'])->name('password');
            Route::post('/profile/update', [FrontendController::class, 'update'])->name('profile.update');
            Route::post('/profile/password/update', [FrontendController::class, 'updatePassword'])->name('profile.password.update');

            Route::get('orderhistory', [NormalUserController::class, 'orderhistory'])->name('orderhistory');
            Route::get('wishlist', [FrontendController::class, 'getwishlist'])->name('getwishlist');

            Route::get('addressbook', [NormalUserController::class, 'addressbook'])->name('addressbook');
            Route::get('addaddressbook', [NormalUserController::class, 'addressbookpage'])->name('add.address');
            Route::post('/storeaddressbook', [NormalUserController::class, 'storeaddressbook'])->name('storeaddressbook');
            Route::post('/updateaddressbook', [NormalUserController::class, 'updateaddressbook'])->name('address.update');
            Route::post('order', [OrderController::class, 'store'])->name('orderitems');
            Route::post('ordercheckout', [NormalUserController::class, 'ordercheckout'])->name('ordercheckout');
            Route::post('orderdelivery', [NormalUserController::class, 'orderdelivery'])->name('orderdelivery');
            Route::get('/delivery', function ($locale) {
                $contactInfo = Brand::first();
                return view('frontend.shopping.delivery',compact('locale','contactInfo'));
            })->name('shoppingdelivery');
            Route::get('/overview', function ($locale) {
                $contactInfo = Brand::first();
                return view('frontend.shopping.overview',compact('locale','contactInfo'));
            })->name('shoppingoverview');
        
            Route::get('/paymentsuccess', function ($locale) {
                $contactInfo = Brand::first();
                return view('frontend.shopping.paymentsuccess',compact('locale','contactInfo'));
            })->name('ordersuccess');
            Route::post('molliepayment', [NormalUserController::class, 'preparePayment'])->name('molliepayment');
        });

        Route::get('shop', [FrontendController::class, 'getproducts'])->name('productslist');
        Route::get('productsdesc/{slug}', [FrontendController::class, 'getproductsdesc'])->name('productdesc');
        Route::get('addtocart/{id}', [FrontendController::class, 'addToCart'])->name('addtocart');
        Route::get('cart', [FrontendController::class, 'cart'])->name('cart');
        Route::post('checkout', [FrontendController::class, 'checkout'])->name('customer.checkout');
        Route::get('checkout', [NormalUserController::class, 'checkout'])->name('checkout');
        Route::post('update-cart', [FrontendController::class, 'updatecart'])->name('updatecart');
        Route::post('removecart', [FrontendController::class, 'remove'])->name('removecart');
        Route::get('search', [SearchController::class, 'search'])->name('search');
        Route::get('wishlist', [FrontendController::class, 'wishlist'])->name('wishlist');

      
      
       
        Route::get('molliewebhook', [NormalUserController::class, 'handleWebhookNotification'])->name('molliewebhook');
 ;
    
        Route::get('searchresults', [FrontendController::class, 'searchresults'])->name('searchresults');


        Route::post('/save-email', [EmailController::class, 'store'])->name('save.email');

        // Route::get('blog/{slug}', [FrontendController::class, 'show'])->name('blog.show');
        //Route::get('projecten/{slug}', [FrontendController::class, 'show'])->name('project.show');
    });
});
