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

Route::get('/', function () {return view('welcome');})->name('index');
Route::get('room-ui',function (){return view('room-ui');})->name('room-ui');
Route::get('about',function (){return view('about');})->name('about');


Route::get('detail/{slug}',[PageController::class,'show'])->name('detail');
Route::get('book/{id}',[PageController::class,'book'])->name('book');
Route::post('booking',[PageController::class,'booking'])->name('booking');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware("auth")->group(function(){
    Route::view("test","test")->name('test');
    Route::post("test",[TestController::class,'test'])->name('test');
    Route::resource('feature',\App\Http\Controllers\FeatureController::class);

    Route::resource('room',\App\Http\Controllers\RoomController::class);
    Route::resource('photo',\App\Http\Controllers\PhotoController::class);


    Route::prefix("profile")->name("profile.")->group(function(){
        Route::view("/","profile.index")->name('index');
        Route::get('/change-photo',[ProfileController::class,'updatePhotoView'])->name('update-photo');
        Route::post('/change-photo',[ProfileController::class,'updatePhoto'])->name('update-photo');
        Route::get("/change-password",[ProfileController::class,'changePassword'])->name('change-password');
        Route::post("/change-password",[ProfileController::class,'updatePassword'])->name('change-password');
    });
});
