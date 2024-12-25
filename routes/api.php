<?php

use App\Http\Controllers\API\AdvenActController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CafeController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DistrictController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\GuideController;
use App\Http\Controllers\API\HomestayController;
use App\Http\Controllers\API\HotelController;
use App\Http\Controllers\API\PlaceController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\VehicleHubController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register',[AuthController::class,'signup'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware('auth:sanctum')->group(function()
{
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/districts/{districtName}',[DistrictController::class,'show']);
Route::apiResource('/districts',DistrictController::class)->except(['show']);
Route::apiResource('/category',CategoryController::class)->except(['show']);
Route::apiResource('/places',PlaceController::class)->except(['show']);
Route::apiResource('/cafes',CafeController::class)->except(['show']);
Route::apiResource('/restaurants',RestaurantController::class)->except(['show']);
Route::apiResource('/homestays',HomestayController::class)->except(['show']);
Route::apiResource('/hotels',HotelController::class)->except(['show']);
Route::apiResource('/events',EventController::class)->except(['show']);
Route::apiResource('/guides',GuideController::class)->except(['show']);
Route::apiResource('/vehicleHubs',VehicleHubController::class)->except(['show']);
Route::apiResource('/advenacts',AdvenActController::class)->except(['show']);
Route::get('/places/{placename}',[PlaceController::class,'show']);
Route::get('/cafes/{cafeName}',[CafeController::class,'show']);
Route::get('/restaurants/{restaurantName}',[RestaurantController::class,'show']);
Route::get('/hotels/{hotelName}',[RestaurantController::class,'show']);
Route::get('/homestays/{homestayName}',[RestaurantController::class,'show']);
Route::get('/advenacts/{advenactName}',[RestaurantController::class,'show']);
Route::get('/events/{eventName}',[RestaurantController::class,'show']);
Route::get('/guides/{guideName}',[RestaurantController::class,'show']);
Route::get('/categories/{categoryName}',[RestaurantController::class,'show']);

});