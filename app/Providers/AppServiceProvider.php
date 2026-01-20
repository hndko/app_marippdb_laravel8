<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
                $settings = \App\Models\Setting::all();

                foreach ($settings as $setting) {
                    if ($setting->key === 'app_name') {
                        config(['app.name' => $setting->value]);
                    } elseif ($setting->key === 'app_shortname') {
                        config(['app.shortname' => $setting->value]);
                    }
                    config(['settings.' . $setting->key => $setting->value]);
                }
            }
        } catch (\Exception $e) {
            // Safe fallback
        }
    }
}
