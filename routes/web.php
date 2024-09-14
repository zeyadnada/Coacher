<?php

use App\Http\Controllers\appendages\NotificationController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\HomePage;
use App\Http\Controllers\dashboard\PaymentconfigController;
use App\Http\Controllers\dashboard\SubscriptionController;
use App\Http\Controllers\dashboard\TrainerController;
use App\Http\Controllers\dashboard\TrainingPackageController;
use App\Http\Controllers\dashboard\TransformationController;
use App\Http\Controllers\dashboard\WhatsAppConfigontroller;
use App\Http\Controllers\Payment\PaymobController;
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

// Custom login route
// Route::get('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('user.login');
// Route::post('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('user.login');

// Custom logout route
// Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Custom registration routes
// Route::get('/user/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('user.register');
// Route::post('/user/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('user.register');

// Password reset routes
// Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

// Email verification routes
// Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
// Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');

///////////////////////////////////////////{*--User Routing--*}\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

Route::get('/', [HomePageController::class, 'index'])->name('home');
Route::as('user.')
    ->group(function () {
        Route::get('/training-packages', [UserTrainingPackageController::class, 'index'])->name('training-packages.index');
        Route::get('/training-packages/{id}', [UserTrainingPackageController::class, 'show'])->name('training-packages.show');
        Route::post('/subscribe', [UserSubscriptionController::class, 'store'])->name('subscription.store');
        Route::put('/subscribe/{id}', [UserSubscriptionController::class, 'update'])->name('subscription.update');
        Route::get('/trainers', [UserTrainerController::class, 'index'])->name('trainer.index');
        Route::get('/trainer/{id}', [UserTrainerController::class, 'show'])->name('trainer.show');
        Route::post('/coupon/{id}', [CouponsController::class, "store"])->name('coupon.store');
        Route::delete('/coupon/{id}', [CouponsController::class, "destroy"])->name('coupon.destroy');
    });
Auth::routes();


///////////////////////////////////////////{*--Admin AUTH Routing--*}\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');


///////////////////////////////////////////{*--Admin Dashboard Routing--*}\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

Route::middleware(['admin'])
    ->prefix('dashboard')
    ->as('dashboard.')
    ->group(function () {
        Route::get('/home', HomePage::class)->name('home');
        Route::resource('admin', AdminController::class);
        Route::get('/admin/admin/{id}',[AdminController::class,'makeAdmin'])->name('admin.admin');
    Route::get('/admin/super/{id}', [AdminController::class, 'makeSuperAdmin'])->name('admin.super');

        // Route::get('showProfile', [AdminController::class, 'showProfile'])->name('showProfile');
        // Route::get('editProfile', [AdminController::class, 'editProfile'])->name('editProfile');
        // Route::put('UpdateAdminProfile', [AdminController::class, 'UpdateAdminProfile'])->name('UpdateAdminProfile');
        Route::get('/coupon/index', [CouponsController::class, 'index'])->name("coupon.index");
        Route::get('/coupon', [CouponsController::class, 'create'])->name("coupon.create");
        Route::post('/coupon/save', [CouponsController::class, 'save'])->name("coupon.save");
        Route::get('/coupon/edit/{id}', [CouponsController::class, 'edit'])->name("coupon.edit");
        Route::put('/coupon/update/{id}', [CouponsController::class, 'update'])->name("coupon.update");
        Route::delete('/coupon/delete/{id}', [CouponsController::class, 'delete'])->name("coupon.delete");

        Route::resource('trainers', TrainerController::class);
        Route::resource('training-packages', TrainingPackageController::class);
        // Custom routes for specific subscription statuses
        Route::get('/subscriptions/paid', [SubscriptionController::class, 'paid'])->name('subscriptions.paid');
        Route::get('/subscriptions/pending', [SubscriptionController::class, 'pending'])->name('subscriptions.pending');
        Route::get('/subscriptions/canceled', [SubscriptionController::class, 'canceled'])->name('subscriptions.canceled');
        Route::resource('subscriptions', SubscriptionController::class);
        Route::get('/payment-settings', [PaymentconfigController::class, 'index'])->name('setting.paymentConfig.index');
        Route::post('/payment-settings/update', [PaymentconfigController::class, 'updatePaymentConfig'])->name('setting.paymentConfig.update');
        Route::get('/whatsApp-settings', [WhatsAppConfigontroller::class, 'index'])->name('setting.whatsApp.index');
        Route::post('/whatsApp-settings/update', [WhatsAppConfigontroller::class, 'updateWhatsAppConfig'])->name('setting.whatsApp.update');
        Route::resource('/transformation', TransformationController::class);
    });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/////////////////////////////////////////////{*-- Notifications Routing--*}\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
Route::get('/notifications/read/{id}', [NotificationController::class, 'markAsRead'])->name('notifications.read');
Route::get('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');


///////////////////////////////////////////////{*--PAYMENT--*}\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
Route::get('/paymob/callback', [PaymobController::class, 'callback']);
Route::get('/paymob/refund/{transaction_id}/{amount}', [PaymobController::class, 'refund'])->name('paymob.refund');
