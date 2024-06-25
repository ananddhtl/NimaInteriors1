<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
class SetLanguage
{
    public function handle($request, Closure $next)
    {
        $locale = $request->query('lang', Session::get('locale', 'nl_be'));

        if (!in_array($locale, Config::get('app.available_locales'))) {
            $locale = 'nl_be';
        }

        App::setLocale($locale);
        Session::put('locale', $locale);

        return $next($request);
    }
}
