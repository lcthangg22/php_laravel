<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
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

// Store

//Route::get('/stores', [StoreController::class, 'getAllStores']);
//
//Route::get('/stores/name/{storeName}', [StoreController::class, 'getStoresByName']);
//
//Route::get('/stores/address/{address}', [StoreController::class, 'getStoresByAddress']);

Route::group(['prefix' => 'stores'], function () {
    Route::get('', [StoreController::class, 'getAllStores']);

    Route::post('/create', [StoreController::class, 'createStore']);

    Route::get('/name/{storeName}', [StoreController::class, 'getStoresByName']);

    Route::get('/address/{address}', [StoreController::class, 'getStoresByAddress']);

    Route::put('/update/{storeId}', [StoreController::class, 'updateStore']);

    Route::delete('/delete/{storeId}', [StoreController::class, 'deleteStore']);
});

// Product

Route::get('/products', [ProductController::class, 'getAllProducts']);

Route::get('/products/year/{year}', [ProductController::class, 'getProductsByYear']);

