<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View::share('key', 123);

        view()->composer('includes.nameDOB', function ($view) {

            $name = $view->getData()['name'];

            $view->with('dob', (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note));
        });


        view()->composer('includes.avatar', function ($view) {


            $view->with('avatar', (new \App\Picture())->where('avatar', 1)->where('name_id', $view->getData()['name']->id)->first());


        } );











































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
