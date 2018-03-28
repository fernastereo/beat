<?php

namespace App\Providers;
use Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        Schema::defaultStringLength(255);

        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add(
                [
                    'text' => 'Inicio',
                    'url' => '/dashboard',
                ]
            );
            $event->menu->add('ADMINISTRACION');
            $event->menu->add(
                [
                    'text' => 'Artículos',
                    'url' => '/index/' . Auth::user()->company_id,
                ]
            );
            $event->menu->add(
                [
                    'text' => 'Clientes',
                    'url' => '/home',
                ]
            );
            $event->menu->add(
                [
                    'text' => 'Proveedores',
                    'url' => '/home',
                ]
            );
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
