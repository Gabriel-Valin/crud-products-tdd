<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'products'], function (){
    Route::get('/getProducts', [ ProductsController::class, 'getProducts' ])->name('allProducts');
    Route::post('/createProduct', [ ProductsController::class, 'createProduct' ])->name('createProduct');
    Route::get('/getOneProduct/{id}', [ ProductsController::class, 'getOneProduct' ])->name('oneProduct');
    Route::delete('/deleteProduct/{id}', [ ProductsController::class, 'deleteProduct' ])->name('deleteProduct');
    Route::put('/updateProduct/{id}', [ ProductsController::class, 'updateProduct' ])->name('updateProduct');
});
