<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DistrictController;
use App\Http\Controllers\API\PlaceController;
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
});