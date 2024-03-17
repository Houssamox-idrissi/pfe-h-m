
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GlasseController;
use App\Http\Controllers\TypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth.jwt')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
// Category
Route::get('/categories', [CategoryController::class, 'homecategory']);
Route::post('/categories', [CategoryController::class, 'storecat']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'editcat']);
Route::put('/categories/{id}/update',[CategoryController::class,'updateCategory']);
Route::delete('/categories/{id}/delete', [CategoryController::class, 'deletecat']);

// Brand
Route::get('/brand/form', [BrandController::class, 'brandForm']);
Route::get('/brands', [BrandController::class, 'homeBrand']);
Route::post('/brands', [BrandController::class, 'storeBrand']);
Route::get('/brands/{id}/edit', [BrandController::class, 'editBrand']);
Route::put('/brands/{id}/update', [BrandController::class, 'updateBrand']);
Route::delete('/brands/{id}/delete', [BrandController::class, 'deleteBrand']);
// Type
Route::get('/types/form', [TypeController::class, 'typeForm']);
Route::get('/types', [TypeController::class, 'homeType']);
Route::post('/types', [TypeController::class, 'storeType']);
Route::get('/types/{id}/edit', [TypeController::class, 'editType']);
Route::put('/types/{id}/update', [TypeController::class, 'updateType']);
Route::delete('/types/{id}/delete', [TypeController::class, 'deleteType']);

// Glasses
Route::get('/glasses', [GlasseController::class, 'homeglasses']);
Route::post('/glasses', [GlasseController::class, 'storeglasses']);
Route::get('/glasses/{id}/edit', [GlasseController::class, 'editglasses']);
Route::put('/glasses/{id}/update', [GlasseController::class, 'updateglasses']);
Route::delete('/glasses/{id}/delete', [GlasseController::class, 'deleteglasses']);


