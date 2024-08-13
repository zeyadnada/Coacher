<?php

use App\Http\Controllers\appendages\NotificationController;
use App\Http\Controllers\dashboard\HomePage;
use App\Http\Controllers\dashboard\SubscriptionController;
use App\Http\Controllers\dashboard\TrainerController;
use App\Http\Controllers\dashboard\TrainingPackageController;
use App\Http\Controllers\user\HomePageController;
use App\Http\Controllers\user\SubscriptionController as UserSubscriptionController;
use App\Http\Controllers\user\TrainerController as UserTrainerController;
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

// Custom login route
Route::get('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('user.login');

// Custom logout route
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Custom registration routes
Route::get('/user/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/user/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('user.register');

// Password reset routes
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

// Email verification routes
Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

///////////////////////////////////////////{*--User Routing--*}\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

Route::get('/', [HomePageController::class, 'index'])->middleware(['auth.user'])->name('home');
Route::middleware(['auth.user'])
    ->as('user.')
    ->group(function () {
        Route::get('/training-packages', [UserTrainingPackageController::class, 'index'])->name('training-packages.index');
        Route::get('/training-packages/{id}', [UserTrainingPackageController::class, 'show'])->name('training-packages.show');
        Route::post('/subscribe', [UserSubscriptionController::class, 'store'])->name('subscription.store');
        Route::put('/subscribe/{id}', [UserSubscriptionController::class, 'update'])->name('subscription.update');
        Route::get('/trainer/{id}', [UserTrainerController::class, 'show'])->name('trainer.show');
    });

// Route::group(['as' => 'user.'], function () {
//     Route::get('/', HomePageController::class)->name('home');
//     Route::get('/training-packages', [UserTrainingPackageController::class, 'index'])->name('training-packages.index');
//     Route::get('/training-packages/{id}', [UserTrainingPackageController::class, 'show'])->name('training-packages.show');
// });
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

/////////////////////////////////////////////{*-- Notifications Routing--*}\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
Route::get('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');