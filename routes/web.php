<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SubCategoryController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\TransactionController;
use \App\Http\Controllers\OrderProductsController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ReviewsController;
use \App\Http\Controllers\PostsController;
use \App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/getFeaturedProducts', [ProductController::class, 'getFeaturedProducts']);

Route::post('/deleteSubCategory', [SubCategoryController::class, 'deleteSubCategory'])
    ->middleware('is_admin');
Route::post('/createSubCategory', [SubCategoryController::class, 'createSubCategory'])
    ->middleware('is_admin');
Route::post('/createProduct', [ProductController::class, 'createProduct'])
    ->middleware('is_admin');

Route::get('/getUserOrderId', [OrderController::class, 'getOrderId']);

Route::post('/transaction', [TransactionController::class, 'transaction'])
    ->middleware('auth');
Route::post('/deleteCartItem', [OrderController::class, 'deleteCartItem'])
    ->middleware('auth');
Route::get('/getUserCart', [OrderController::class, 'getUserCart'])
    ->middleware('auth');
Route::post('/buyProduct', [OrderController::class, 'buyProduct'])
    ->middleware('auth');

Route::post('/updateProduct', [ProductController::class, 'updateProduct'])
    ->middleware('is_admin');
Route::post('/deleteProduct', [ProductController::class, 'deleteProduct'])
    ->middleware('is_admin');

Route::get('/getAllCategories', [SubCategoryController::class, 'getAllCategories']);

Route::get('/getOneProduct/{productId}', [ProductController::class, 'getProduct']);
Route::get('/getMax', [ProductController::class, 'getMaxPriceFirst']);
Route::get('/getMin', [ProductController::class, 'getMinPriceFirst']);

Route::get('/getAllProducts', [ProductController::class, 'getAllProducts']);
Route::get('/orderProducts', [OrderProductsController::class, 'show']);

Route::get('/getProducts/{id}', [ProductController::class, 'getCategoryProduct']);
Route::get('/getCategories', [CategoryController::class, 'getCategories']);

Route::get('/user/status', [AuthController::class, 'getUserStatus']);

Route::get('/user/logout', [AuthController::class, 'logoutUser'])
    ->middleware('auth');

Route::post('/news/add', [NewsController::class, 'addNews'])
    ->middleware('is_admin');
Route::post('/news/delete', [NewsController::class, 'deleteNews'])
    ->middleware('is_admin');
Route::get('/news', [NewsController::class, 'getNews']);

Route::get('/banner', [PostsController::class, 'getBanner']);
Route::post('/banner/update', [PostsController::class, 'updateBanner'])
    ->middleware('is_admin');

Route::get('/reviews', [ReviewsController::class, 'show']);
Route::post('/reviews/send', [ReviewsController::class, 'sendComment']);

Route::post('/reviews/delete', [ReviewsController::class, 'deleteComment'])
    ->middleware('is_admin');

Route::post('/user/login', [AuthController::class, 'loginUser'])
    ->middleware('guest');
Route::post('/user/create', [AuthController::class, 'createUser'])
    ->middleware('guest');

Route::get('/{any}', function () {
    return view('index');
})->where('any', '.*');


