<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NormalUserController;

Route::get('/aboutus', function () {
    return view('frontend.aboutus');
});

Route::get('/gallery', function () {
    return view('frontend.gallery');
});



Route::get('/project-single', function () {
    return view('frontend.project-single');
});



Route::get('/faq', function () {
    return view('frontend.faq');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});


Route::prefix('customer')->group(function () {

    Route::get('/login', function () {
        return view('frontend.customer.login');
    })->name('customer.login');
    Route::get('/register', function () {
        return view('frontend.customer.register');
    })->name('customer.register');

    
    Route::get('/forgetpassword', function () {
        return view('frontend.customer.forgetpassword');
    })->name('customer.forgotpassword');

    Route::get('/changepassword', function () {
        return view('frontend.customer.changepasword');
    })->name('customer.changepassword');
    Route::post('login', [NormalUserController::class, 'login'])->name('customer.login.post');
    Route::post('storenormaluser', [NormalUserController::class, 'store'])->name('normaluserdata');
    Route::get('dashboard', [NormalUserController::class, 'index'])->name('dashboard');
    Route::post('/logout', [NormalUserController::class, 'logout'])->name('customer.logout');
    Route::post('/forgot-password', [NormalUserController::class, 'forgotPassword'])->name('forgot.password');
    Route::post('/change-password', [NormalUserController::class, 'changePassword'])->name('change.password');


});


Route::post('contactusform', [ContactUsController::class, 'store'])->name('contactform');

Route::get('projecten', [FrontendController::class, 'project'])->name('projectlist');
Route::get('projecten/{slug}', [FrontendController::class, 'projectdesc'])->name('projectdesc');

Route::get('products', [FrontendController::class, 'getproducts'])->name('productslist');

Route::get('productsdesc/{id}', [FrontendController::class, 'getproductsdesc'])->name('productdesc');

Route::get('blog', [FrontendController::class, 'blog'])->name('bloglist');
Route::get('/blog/{slug}', [FrontendController::class, 'blogsingledesc'])->name('blogsinglelist');



Route::get('algemene-voorwaarden', [FrontendController::class, 'generaltermandcondition'])->name('generaltermandcondition');

Route::get('privacy', [FrontendController::class, 'privacy'])->name('privacy');
// Route::post('language-switch', [FrontendController::class, 'languageSwitch'])->name('language.switch');

Route::middleware(['auth:web'])->prefix('customer')->group(function () {
   
    Route::get('dashboard', [FrontendController::class, 'dashboard'])->name('dashboard');
    Route::get('updateprofile', [FrontendController::class, 'updateprofile'])->name('profile');
    Route::get('updatepassword', [FrontendController::class, 'password'])->name('password');
    Route::post('/profile/update', [FrontendController::class, 'update'])->name('profile.update');
    Route::post('/profile/password/update', [FrontendController::class, 'updatePassword'])->name('profile.password.update');

    Route::get('addressbook', [NormalUserController::class, 'addressbook'])->name('addressbook');
    Route::get('addaddressbook', [NormalUserController::class, 'addressbookpage'])->name('add.address');
    Route::post('/storeaddressbook', [NormalUserController::class, 'storeaddressbook'])->name('storeaddressbook');
});
Route::group(["prefix" => "shop", "as" => "shop."], function () {
    Route::get('/grid', function () {
        return view('frontend.shopping.gridshop');
    });
    Route::get('/product-detail', function () {
        return view('frontend.shopping.product-detail');
    });

});