<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\FrontendController;
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
// Route::get('/', function () {
//     return view('frontend.homepage');
// })->name('frontend.homepage');

// Route::get('/', function () {
//     return redirect('/BE');
// });
Route::get('/', function () {
    $locale = request()->query('lang', session('locale', 'nl_be'));
    return redirect()->route('frontend.homepage', ['locale' => $locale]);
})->name('default');

Route::middleware(['set.language'])->group(function () {
    // Homepage route with language prefix
    Route::get('/{locale?}', [FrontendController::class, 'homepage'])
         ->name('frontend.homepage');
});
// Define a route group for localized routes
// Route::group(['prefix' => '{locale}', 'middleware' => 'setlocale'], function() {
//     // Define the route for the homepage with the {locale} parameter
//     Route::get('/', function () {
//         return view('frontend.homepage');
//     })->name('frontend.homepage');

//     // Other localized routes go here...
// });

// // // Define a separate route for the root URL ('/')
// Route::get('/', function () {
//     // Get the current locale
//     $locale = App::getLocale();

//     // Redirect to the homepage route with the language prefix
//     return redirect()->route('frontend.homepage', ['locale' => $locale]);
// });
Route::get('language/{locale}', function ($locale) {
    // Validate if the locale is supported
    if (!in_array($locale, config('app.available_locales'))) {
        abort(404);
    }

    // Set the application locale
    app()->setLocale($locale);

    // Store the locale in the session
    session()->put('locale', $locale);

    // Redirect to the previous page or fallback route
     // Redirect to the homepage or the previous URL with the language parameter
     return redirect()->route('frontend.homepage', ['locale' => $locale]);
})->name('language.switch');

// Route::get('language/{locale}', function ($locale) {
//     // Validate if the locale is supported
//     if (!in_array($locale, config('app.available_locales'))) {
//         abort(404);
//     }

//     // Set the application locale
//     app()->setLocale($locale);

//     // Store the locale in the session
//     session()->put('locale', $locale);

//     // Redirect to the homepage or the previous URL with the language parameter
//     $previousUrl = url()->previous();
//     $parsedUrl = parse_url($previousUrl);
//     parse_str($parsedUrl['query'] ?? '', $queryParams);
//     $queryParams['lang'] = $locale;

//     $redirectUrl = url($parsedUrl['path']) . '?' . http_build_query($queryParams);
//     return redirect($redirectUrl);
// })->name('language.switch');

require __DIR__ . '/backend/backend.php';
require __DIR__ . '/frontend/frontend.php';