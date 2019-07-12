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
            'App\Repositories\Users\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\Authors\AuthorRepositoryInterface',
            'App\Repositories\Authors\AuthorRepository'
        );
        $this->app->bind(
            'App\Repositories\Books\BookRepositoryInterface',
            'App\Repositories\Books\BookRepository'
        );
        $this->app->bind(
            'App\Repositories\BookUser\BookUserRepositoryInterface',
            'App\Repositories\BookUser\BookUserRepository'
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
