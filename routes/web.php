<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('detail/{slug}',[PageController::class,'show'])->name('detail');
Route::get('booking/{id}',[\App\Http\Controllers\PageController::class,'book'])->name('booking');
Route::post('booking',[\App\Http\Controllers\PageController::class,'bookStore'])->name('booking.store');

Route::resource('book',\App\Http\Controllers\BookController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware("auth")->group(function(){
    Route::view("test","test")->name('test');
    Route::post("test",[TestController::class,'test'])->name('test');

    Route::resource('feature',\App\Http\Controllers\FeatureController::class)->middleware('isAdmin');
    Route::resource('room',\App\Http\Controllers\RoomController::class)->middleware('isAdmin');
    Route::resource('photo',\App\Http\Controllers\PhotoController::class)->middleware('isAdmin');


    Route::prefix("profile")->name("profile.")->group(function(){
        Route::view("/","profile.index")->name('index');
        Route::get('/change-photo',[ProfileController::class,'updatePhotoView'])->name('update-photo');
        Route::post('/change-photo',[ProfileController::class,'updatePhoto'])->name('update-photo');
        Route::get("/change-password",[ProfileController::class,'changePassword'])->name('change-password');
        Route::post("/change-password",[ProfileController::class,'updatePassword'])->name('change-password');
    });
});
