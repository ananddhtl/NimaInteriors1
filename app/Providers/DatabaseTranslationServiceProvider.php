<?php
namespace App\Providers;


use App\Translation\DatabaseLoader;
use Illuminate\Translation\Translator;
use Illuminate\Support\Facades\Log;
use Illuminate\Translation\TranslationServiceProvider as ServiceProvider;

class DatabaseTranslationServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Register the custom translation loader
        $this->app->singleton('translation.loader', function ($app) {
            return new DatabaseLoader($app['files'], $app['path.lang']);
        });

        // Override the translator with our custom loader
        $this->app->singleton('translator', function ($app) {
            $loader = $app['translation.loader'];
            $locale = $app['config']['app.locale'];
            $trans = new Translator($loader, $locale);
            $trans->setFallback($app['config']['app.fallback_locale']);
            return $trans;
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $locale = app()->getLocale();
        Log::info('DatabaseTranslationServiceProvider boot method called.');
        Log::info('Current Locale in ServiceProvider: ' . $locale);
    }
}
