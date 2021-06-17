<?php
/**
 * @author Yogesh Gholap
 * @email yagholap@gmail.com
 * @create date 2021-06-17 23:42:12
 * @modify date 2021-06-17 23:42:12
 * @desc [description]
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UrlRepository;
use App\Repositories\Interfaces\UrlRepositoryInterface;

class UrlServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UrlRepositoryInterface::class, UrlRepository::class);
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