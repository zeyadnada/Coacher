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
Auth::routes();



Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin'])
    ->prefix('dashboard')
    ->as('dashboard.')
    ->group(function () {
        Route::get('/home', HomePage::class)->name('home');
        Route::resource('trainers', TrainerController::class);
        Route::resource('training-packages', TrainingPackageController::class);
        Route::resource('subscriptions', SubscriptionController::class);
        Route::get('final', function () {
            return view('dashboard.settings.result_photos');
        })->name('result_photos');
    });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
