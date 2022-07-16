<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function(){
    Route::get('/login/panel', [\App\Http\Controllers\Auth\AdminController::class, 'showAdminLoginForm'])->name('admin.login.form');
    Route::post('/login', [\App\Http\Controllers\Auth\AdminController::class, 'adminLogin'])->name('admin.login');
    Route::group(['middleware' => 'isAdmin'], function(){
        Route::get('/dashboard', [\App\Http\Controllers\Auth\AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [\App\Http\Controllers\Auth\AdminController::class, 'logout'])->name('admin.logout');
    });
});

//Functionality logic
Route::group(['middleware' => 'isAdmin'], function(){
    Route::resource('/categories', CategoryController::class);
    Route::resource('/subcategories', SubcategoryController::class);
    Route::resource('/brands', BrandController::class);

    //General routing
    Route::get('/category-wise-subcategory/{id}', [\App\Http\Controllers\Admin\SubcategoryController::class, 'categoryWiseSubcategory']);
    //Product routing
    Route::get('/products', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products.index');
    Route::get('/admin/products/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{id}/{slug}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/update/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('products.update');
    Route::get('/products/active/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'active'])->name('products.active');
    Route::get('/products/inactive/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'inactive'])->name('products.inactive');
    Route::get('/products/delete/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('products.delete');

    //======================== All orders =========================//
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'orders'])->name('customer.products.order');
    Route::get('/order/view/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'ordersView'])->name('customer.products.order.view');
    Route::get('/order/pdf/{orderId}', [\App\Http\Controllers\Admin\OrderController::class, 'ordersPdf'])->name('customer.products.order.pdf');
    Route::get('/pdf', [\App\Http\Controllers\Admin\OrderController::class, 'pdf']);

    Route::get('pdf', function () {
        return view('admin.pdf');
     });

    //======================== Order reports =========================//
    Route::get('/order/report', [\App\Http\Controllers\Admin\ReportController::class, 'ordersReport'])->name('customer.products.order.report');

    //======================== All stocks =========================//
    Route::get('/stocks', [\App\Http\Controllers\Admin\OrderController::class, 'stocks'])->name('products.stock');

    Route::group(['prefix' => 'status'], function(){
        Route::get('/pending/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'pending'])->name('order.pending');
        Route::get('/shipping/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'shipping'])->name('order.shipping');
        Route::get('/complete/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'complete'])->name('order.complete');
    });

    //========== Customer and Supplier list ===============//
    Route::get('/supplier/list', [\App\Http\Controllers\Admin\AdminController::class, 'supplierList']);
    Route::get('/supplier/active/{supplier}', [\App\Http\Controllers\Admin\AdminController::class, 'supplierActive']);
    Route::get('/supplier/inactive/{supplier}', [\App\Http\Controllers\Admin\AdminController::class, 'supplierInactive']);
    Route::get('/supplier/delete/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'supplierDelete']);
    Route::get('/customer/list', [\App\Http\Controllers\Admin\AdminController::class, 'customerList']);
    Route::get('/customer/delete/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'customerDelete']);
    Route::get('/contacts', [\App\Http\Controllers\Admin\AdminController::class, 'contacts']);
    Route::get('/contact/delete/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'contactDelete']);

    //========== Website settings ===============//
    Route::get('/slider/list', [\App\Http\Controllers\Admin\AdminController::class, 'sliderList']);
    Route::get('/slider/create', [\App\Http\Controllers\Admin\AdminController::class, 'sliderCreate']);
    Route::post('/slider/store', [\App\Http\Controllers\Admin\AdminController::class, 'sliderStore']);
    Route::get('/slider/edit/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'sliderEdit']);
    Route::post('/slider/update/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'sliderUpdate']);
    Route::get('/slider/delete/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'sliderDelete']);

    //============== Blog ==================//
    Route::group(['prefix' => 'blog'], function(){
        Route::get('/list', [\App\Http\Controllers\Admin\BlogController::class, 'index']);
        Route::get('/create', [\App\Http\Controllers\Admin\BlogController::class, 'create']);
        Route::post('/store', [\App\Http\Controllers\Admin\BlogController::class, 'store']);
        Route::get('/edit/{blog}', [\App\Http\Controllers\Admin\BlogController::class, 'edit']);
        Route::post('/update/{blog}', [\App\Http\Controllers\Admin\BlogController::class, 'update']);
        Route::get('/delete/{blog}', [\App\Http\Controllers\Admin\BlogController::class, 'destroy']);

        Route::get('/active/{blog}', [\App\Http\Controllers\Admin\BlogController::class, 'active']);
        Route::get('/inactive/{blog}', [\App\Http\Controllers\Admin\BlogController::class, 'inactive']);
    });
});
