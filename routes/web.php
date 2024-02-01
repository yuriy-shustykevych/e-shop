<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Livewire::setScriptRoute(function ($handle) {
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $segments = explode('/', trim($urlPath, '/'));
    // Use the null coalescing operator to simplify the conditional assignment
    $rootFolder = count($segments) >= 2 ? $segments[0] : 'localhost';
    return Route::get($rootFolder . '/public/livewire/livewire.js', $handle);
});

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productView']);

Route::middleware(['auth'])->group(function (){
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);

    Route::get('profile', [App\Http\Controllers\Frontend\UserContraller::class, 'index']);
    Route::post('profile', [App\Http\Controllers\Frontend\UserContraller::class, 'updateUserDetails']);
});

Route::get('thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankYou']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function (){
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function (){
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products ', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product_id}/delete', 'destroy');

        Route::get('/product-image/{product_image_id}/delete', 'destroyImage');
    });

    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function (){
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');
    });

});

Route::controller(App\Http\Controllers\OmdbapiController::class)->group(function (){
    Route::get('/omdbapi', 'index');
    Route::post('/omdbapi','index');
    Route::post('/omdbapi/{pageNumber}','searchMovie');
    Route::get('/omdbapi/{movieId}','movieDetails');
    Route::post('/email-route/{movieId}', 'emailSend');
    Route::get('/movie-pdf-data', 'pdfFile');
});


