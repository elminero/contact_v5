<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Repositories\Names;

use App\Name;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Name $name)
    {
        // View::share('key', 123);

        view()->composer('includes.nameDOB', function ($view) {
            $name = $view->getData()['name'];
            $view->with('dob', (new \App\Repositories\Names)->Dob($name->byear, $name->bmonth, $name->bday, $name->note));

        });


        view()->composer('includes.avatar', function ($view) {
            $view->with('avatar', (new \App\Picture())->where('avatar', 1)->where('name_id', $view->getData()['name']->id)->first());
        } );



        view()->composer('includes.tagForm', function ($view) {

            $tags = $view->getData()['name']->tags;
            $tagsInUse = [];

            foreach ($tags as $tag) {
                $tagsInUse[] = $tag->name;
            }

            $tags = \App\Tag::get();

            $view->with('tags', $tags)->with('tagsInUse', $tagsInUse);
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
