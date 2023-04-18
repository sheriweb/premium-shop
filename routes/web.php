<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ImportProductsController;
use App\Http\Controllers\admin\OrderConterller;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\StoreController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [\App\Http\Controllers\theme\HomeController::class, 'index']);
Route::get('/brands', [\App\Http\Controllers\theme\HomeController::class, 'brands'])->name('home.brands');
Route::get('/brands/{slug}', [\App\Http\Controllers\theme\HomeController::class, 'brandProducts'])->name('home.brand.products');


Route::middleware(['middleware' => 'auth'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/category-list', [CategoryController::class, 'show']);
    Route::get('/sub-category', [CategoryController::class, 'subCategoryIndex']);
    Route::post('/add-category-node', [CategoryController::class, 'addCategoryNode']);

    Route::get('/products', [ProductController::class, 'index'])->name('homeProductList');
    Route::get('/general-products', [ProductController::class, 'generalProducts']);
    Route::get('/add-product', [ProductController::class, 'create']);
    Route::get('/add-general-product', [ProductController::class, 'generalProduct']);
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::get('/product/category/get-nodes', [ProductController::class, 'getCategoryNodes']);
    Route::get('/product-list', [ProductController::class, 'show']);
    Route::get('/general-product-list', [ProductController::class, 'showGeneralProducts']);



    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::get('/edit-general-product/{id}', [ProductController::class, 'editGeneralProduct']);
    Route::get('/product/delete/image/{id}', [ProductController::class, 'deleteProductImage']);
    Route::get('/import-products', [ImportProductsController::class, 'index']);
    Route::post('/import', [ImportProductsController::class, 'importProducts'])->name('import');

    Route::get('/admin/orders',[OrderConterller::class,'index']);
    Route::get('/order-list',[OrderConterller::class,'show']);

    Route::get('/dashboard', function () {
        redirect('/admin');
    })->name('dashboard');


    Route::controller(BlogsController::class)->group(function(){
        Route::get('/add/blog', 'create')->name('add.blog');
        Route::post('/blog/store', 'store')->name('store.blog');
        Route::get('/blog/show', 'show')->name('blog.show');
        Route::get('/blog/list', 'blogList')->name('blog.list');
        Route::get('/edit-blog/{id}', 'edit')->name('blog.edit');
        Route::get('/delete-blog', 'destroy')->name('delete.blog');

    });

    //Store Route
    Route::prefix('store')->group(function () {
        Route::get('/list', [StoreController::class, 'index'])->name('store-list');
        Route::post('/save', [StoreController::class, 'save'])->name('store-save');
    });

    //Color Route
    Route::prefix('color')->group(function () {
        Route::get('/list', [ColorController::class, 'index'])->name('color-list');
        Route::post('/save', [ColorController::class, 'save'])->name('color-save');
    });

    //Size Route
    Route::prefix('size')->group(function () {
        Route::get('/list', [SizeController::class, 'index'])->name('size-list');
        Route::post('/save', [SizeController::class, 'save'])->name('size-save');
    });

});

Auth::routes();

