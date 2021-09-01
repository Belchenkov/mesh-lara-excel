<?php

namespace App\Providers;

use App\Http\Excel\Data\Repositories\Contracts\IExcel;
use App\Http\Excel\Data\Repositories\ExcelRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IExcel::class, ExcelRepository::class);
    }
}
