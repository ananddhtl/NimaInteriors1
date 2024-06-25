<?php
// app/helpers.php
use App\Models\Translation;

if (!function_exists('get_translation')) {
    function get_translation($key, $default = '')
    {
        $locale = app()->getLocale();
        $translation = Translation::getTranslationByKey($key, $locale);
        return $translation ?: $default;
    }
}
if (!function_exists('route_with_locale')) {

    function route_with_locale($name, $parameters = [], $absolute = true)
    {
        // Ensure parameters is an array
        if (!is_array($parameters)) {
            $parameters = [];
        }

        // Get the locale from the session
        $locale = session('locale', config('app.locale')); // Default to app locale if session locale is not set

        // Add the locale to parameters
        $parameters['locale'] = $locale;

        // Generate the route with the given parameters and locale
        return route($name, $parameters, $absolute);
    }
}
