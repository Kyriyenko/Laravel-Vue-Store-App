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


