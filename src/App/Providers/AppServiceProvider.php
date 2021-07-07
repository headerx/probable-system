<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Turbine\Menus\Concerns\RegistersMenusLivewireComponents;

class AppServiceProvider extends ServiceProvider
{
    use RegistersMenusLivewireComponents;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLivewire();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
