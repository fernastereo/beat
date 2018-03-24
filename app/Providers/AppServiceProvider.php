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
            $event->menu->add('CORREO');
            $event->menu->add(
                [
                    'text' => 'Mensajes',
                    'url' => '/inbox/' . Auth::user()->email,
                    'label' => 18,
                ]
            );
            $event->menu->add(
                [
                    'text' => 'Redactar',
                    'url' => 'admin/blog',
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
