<?php

use App\Http\Controllers\dashboard\HomePage;
use App\Http\Controllers\dashboard\SubscriptionController;
use App\Http\Controllers\dashboard\TrainerController;
use App\Http\Controllers\dashboard\TrainingPackageController;
use App\Http\Controllers\user\HomePageController;
use App\Http\Controllers\user\TrainingPackageController as UserTrainingPackageController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });


///////////////////////////////////////////{*--User Routing--*}\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

Route::group(['as' => 'user.'], function () {
    Route::get('/', HomePageController::class)->name('home');
    Route::get('/training-packages', [UserTrainingPackageController::class, 'index'])->name('training-packages.index');
    Route::get('/training-packages/{id}', [UserTrainingPackageController::class, 'show'])->name('training-packages.show');
});
Auth::routes();


///////////////////////////////////////////{*--AUTH Routing--*}\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');




///////////////////////////////////////////{*--Admin Dashboard Routing--*}\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

Route::middleware(['admin'])
    ->prefix('dashboard')
    ->as('dashboard.')
    ->group(function () {
        Route::get('/home', HomePage::class)->name('home');
        Route::resource('trainers', TrainerController::class);
        Route::resource('training-packages', TrainingPackageController::class);
        // Custom routes for specific subscription statuses
        Route::get('/subscriptions/paid', [SubscriptionController::class, 'paid'])->name('subscriptions.paid');
        Route::get('/subscriptions/pending', [SubscriptionController::class, 'pending'])->name('subscriptions.pending');
        Route::get('/subscriptions/canceled', [SubscriptionController::class, 'canceled'])->name('subscriptions.canceled');
        Route::resource('subscriptions', SubscriptionController::class);
        Route::get('final', function () {
            return view('dashboard.settings.result_photos');
        })->name('result_photos');
    });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');