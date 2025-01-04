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
use App\Http\Controllers\API\notifController;
use App\Http\Controllers\API\PlaceController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\VehicleHubController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register',[AuthController::class,'signup'])->name('register');
Route::post('/emailverify',action: [AuthController::class,'emailVerify'])->name('registerVerify');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware('auth:sanctum')->group(function()
{
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::apiResource('/districts',DistrictController::class)->except(['show']);
Route::apiResource('/categories',CategoryController::class);
Route::apiResource('/places',PlaceController::class)->except(['show']);
Route::apiResource('/cafes',CafeController::class)->except(['show']);
Route::apiResource('/restaurants',RestaurantController::class)->except(['show']);
Route::apiResource('/homestays',HomestayController::class)->except(['show']);
Route::apiResource('/hotels',HotelController::class)->except(['show']);
Route::apiResource('/events',EventController::class)->except(['show']);
Route::apiResource('/guides',GuideController::class)->except(['show']);
Route::apiResource('/vehicleHubs',VehicleHubController::class)->except(['show']);
Route::apiResource( '/advenacts',AdvenActController::class)->except(['show']);


Route::get('/district',[DistrictController::class,'show']);
Route::get('/advenact',[AdvenActController::class,'show']);
Route::get('/place',[PlaceController::class,'show']);
Route::get('/cafe',[CafeController::class,'show']);
Route::get('/restaurant',[RestaurantController::class,'show']);
Route::get('/hotel',[HotelController::class,'show']);
Route::get('/homestay',[HomestayController::class,'show']);
Route::get('/guide',[GuideController::class,'show']);
Route::get('/event',[EventController::class,'show']);
Route::get('/vehiclehub',[VehicleHubController::class,'show']);


});
Route::get('/updateplace/{placeid}',[PlaceController::class,'updatepage'])->name('updateplaceController');
Route::post('/notifPermission',[notifController::class,'notifpermission']);
