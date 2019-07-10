<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Users\UserRepositoryInterface',
            'App\Repositories\Users\UserRepository',
            'App\Repositories\Books\BookRepositoryInterface',
            'App\Repositories\Books\BookRepository',
            'App\Repositories\Authors\AuthorRepositoryInterface',
            'App\Repositories\Authors\AuthorRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
