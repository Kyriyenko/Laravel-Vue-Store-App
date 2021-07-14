<?php

use Illuminate\Support\Facades\Route;

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










Route::post('/deleteSubCategory',[\App\Http\Controllers\SubCategoryController::class,'deleteSubCategory']);

Route::post('/createSubCategory',[\App\Http\Controllers\SubCategoryController::class,'createSubCategory']);

Route::post('/createProduct',[\App\Http\Controllers\ProductController::class,'createProduct']);

Route::get('/getUserOrderId',[\App\Http\Controllers\OrderController::class,'getOrderId']);
Route::post('/transaction',[\App\Http\Controllers\TransactionController::class,'transaction']);

Route::post('/deleteCartItem',[\App\Http\Controllers\OrderController::class,'deleteCartItem']);

Route::get('/getUserCart',[\App\Http\Controllers\OrderController::class,'getUserCart']);

Route::post('/buyProduct',[\App\Http\Controllers\OrderController::class,'buyProduct']);

Route::post('/updateProduct',[\App\Http\Controllers\ProductController::class,'updateProduct']);
Route::post('/deleteProduct',[\App\Http\Controllers\ProductController::class,'deleteProduct']);

Route::get('/getAllCategories',[\App\Http\Controllers\SubCategoryController::class,'getAllCategories']);

Route::get('/getOneProduct/{productId}',[\App\Http\Controllers\ProductController::class,'getProduct']);
Route::get('/getMax',[\App\Http\Controllers\ProductController::class,'getMaxPriceFirst']);
Route::get('/getMin',[\App\Http\Controllers\ProductController::class,'getMinPriceFirst']);

Route::get('/getAllProducts',[\App\Http\Controllers\ProductController::class,'getAllProducts']);
Route::get('/orderProducts',[\App\Http\Controllers\OrderProductsController::class,'show']);

Route::get('/getProducts/{id}',[\App\Http\Controllers\ProductController::class,'getCategoryProduct']);
Route::get('/getCategories',[\App\Http\Controllers\CategoryController::class,'getCategories']);

Route::get('/user/status',[\App\Http\Controllers\AuthController::class, 'getUserStatus']);
Route::get('/user/logout',[\App\Http\Controllers\AuthController::class, 'logoutUser']);
Route::get('/reviews',[\App\Http\Controllers\ReviewsController::class,'show']);

Route::get('/banner',[\App\Http\Controllers\PostsController::class,'getBanner']);

Route::post('/news/add',[\App\Http\Controllers\NewsController::class,'addNews']);
Route::post('/news/delete',[\App\Http\Controllers\NewsController::class,'deleteNews']);
Route::get('/news',[\App\Http\Controllers\NewsController::class,'getNews']);

Route::post('/banner/update',[\App\Http\Controllers\PostsController::class,'updateBanner']);


Route::post('/reviews/send',  [\App\Http\Controllers\ReviewsController::class, 'sendComment']);
Route::post('/reviews/delete',  [\App\Http\Controllers\ReviewsController::class, 'deleteComment']);

Route::post('/user/login',  [\App\Http\Controllers\AuthController::class, 'loginUser']);
Route::post('/user/create',  [\App\Http\Controllers\AuthController::class, 'createUser']);



Route::get('/{any}', function () {
    return view('index');
})->where('any','.*');


