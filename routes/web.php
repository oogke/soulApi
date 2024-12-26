<?php

use App\Http\Controllers\EmailverifyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::view('/loginView','login')->name('loginView');
Route::view('/registerView','register')->name('registerView');

Route::view( '/manageDistricts','admin.district.index')->name('manageDistricts');
Route::view( '/managePlaces','admin.place.index')->name('managePlaces');
Route::view( '/manageHotels','admin.hotel.index')->name('manageHotels');
Route::view( '/manageRestaurants','admin.restaurant.index')->name('manageRestaurants');
Route::view( '/manageCafes','admin.cafe.index')->name('manageCafes');
Route::view( '/manageEvents','admin.event.index')->name('manageEvents');
Route::view( '/manageGuides','admin.guide.index')->name('manageGuides');
Route::view( '/manageVehicleHub','admin.vehicleHub.index')->name('manageVehicleHub');
Route::view( '/manageCategories','admin.category.index')->name('manageCategories');
Route::view( '/manageAdventureActs','admin.advenAct.index')->name('manageAdventureActs');
Route::view( '/manageUsers','admin.user.index')->name('manageUsers');
Route::view( '/manageHomestay','admin.homestay.index')->name('manageHomestay');


Route::view( '/createDistricts','admin.district.create')->name('createDistricts');
Route::view( '/createPlaces','admin.place.create')->name('createPlaces');
Route::view( '/createHotels','admin.hotel.create')->name('createHotels');
Route::view( '/createRestaurants','admin.restaurant.create')->name('createRestaurants');
Route::view( '/createCafes','admin.cafe.create')->name('createCafes');
Route::view( '/createEvents','admin.event.create')->name('createEvents');
Route::view( '/createGuides','admin.guide.create')->name('createGuides');
Route::view( '/createVehicleHub','admin.vehicleHub.create')->name('createVehicleHub');
Route::view( '/createCategories','admin.category.create')->name('createCategories');
Route::view( '/createAdventureActs','admin.advenAct.create')->name('createAdventureActs');
Route::view( '/createUsers','admin.user.create')->name('createUsers');
Route::view( '/createHomestay','admin.homestay.create')->name('createHomestay');

Route::get('/sendEmail',[EmailverifyController::class,'EmailVerify'])->name("emailVerify");