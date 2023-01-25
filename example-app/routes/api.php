<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [ProductController::class, 'getProducts']);

Route::post('/products/create', [ProductController::class, 'createProduct']);

Route::get('/products/{price}', [ProductController::class, 'getProductByPrice']);

Route::get('/posts/productName/{productName}', [ProductController::class, 'getPostsByProductName']);

Route::get('/posts/productId/{productId}', [ProductController::class, 'getPostsByProductId']);

Route::get('/posts', [ProductController::class, 'getPosts']);

Route::get('/comments', [ProductController::class, 'getComments']);

Route::get('/comments/{postId}',[ProductController::class,'getCommentsByPostId']);

Route::get('/posts/{comment}',[ProductController::class,'getPostsByComment']);


