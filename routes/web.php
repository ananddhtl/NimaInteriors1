<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.homepage');
})->name('frontend.homepage');

Route::get('language/{locale}', function ($locale) {
    if (!array_key_exists($locale, config('app.available_locales'))) {
        abort(400); // Abort if the locale is not valid
    }

    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
})->name('language.switch');


require __DIR__ . '/backend/backend.php';
require __DIR__ . '/frontend/frontend.php';