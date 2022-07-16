<?php

namespace App\Providers;

use App\Http\View\Composer\HeaderComposer;
use App\Repository\Brand\BrandRepository;
use App\Repository\Subcategory\SubcategoryRepository;
use App\Repository\Category\CategoryRepository;
use App\Repository\Color\ColorRepository;
use App\Repository\Interface\BrandInterface;
use App\Repository\Interface\CategoryInterface;
use App\Repository\Interface\ColorInterface;
use App\Repository\Interface\ProductInterface;
use App\Repository\Interface\SizeInterface;
use App\Repository\Interface\SubcategoryInterface;
use App\Repository\Product\ProductRepository;
use App\Repository\Size\SizeRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(SubcategoryInterface::class, SubcategoryRepository::class);
        $this->app->bind(BrandInterface::class, BrandRepository::class);
        $this->app->bind(ColorInterface::class, ColorRepository::class);
        $this->app->bind(SizeInterface::class, SizeRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);

        //View Composer
        View::composer(['frontend.includes.header'], HeaderComposer::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();
    }
}
