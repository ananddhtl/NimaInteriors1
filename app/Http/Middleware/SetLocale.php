<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (\Session::has('locale')) {
            $locale = \Session::get('locale');
            \Log::debug('Session locale:', ['locale' => $locale]);
            \App::setLocale($locale);
         
        }
        return $next($request);
    }
}
