<?php

use App\Http\Controllers\dashboard\HomePage;
use App\Http\Controllers\dashboard\SubscriptionController;
use App\Http\Controllers\dashboard\TrainerController;
use App\Http\Controllers\dashboard\TrainingPackageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/home', HomePage::class)->name('home');
    Route::resource('trainers', TrainerController::class);
    Route::resource('training-packages', TrainingPackageController::class);
    Route::resource('subscriptions', SubscriptionController::class);
    route::get('final', function () {
        return view('dashboard.settings.result_photos');
    })->name('result_photos');
});
