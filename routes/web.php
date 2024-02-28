<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\isAuthenticated;
use App\Http\Middleware\isNotAuthenticated;
use App\Http\Middleware\isVerifyRestriction;
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








Route::controller(AuthController::class)->group(function () {
    Route::middleware(isNotAuthenticated::class)->group(function () {
        Route::get("register", "register")->name("auth.register");
        Route::post("register", "store")->name("auth.store");
        Route::get("login", "login")->name("auth.login");
        Route::post("login", "check")->name("auth.check");
        Route::get("forgot", "forgot")->name("auth.forgot");
        Route::post("check-email", "checkEmail")->name("auth.checkEmail");
        Route::get("new-password", "newPassword")->name("auth.newPassword");
        Route::post("reset-password", "resetPassword")->name("auth.resetPassword");
    });

    Route::middleware(isAuthenticated::class)->group(function () {
        Route::post("logout", "logout")->name("auth.logout");
        Route::middleware(isVerifyRestriction::class)->group(function () {
            Route::get("password-change", "passwordChangeUI")->name("auth.passwordChangeUi");
            Route::post("password-change", "passwordChange")->name("auth.passwordChange");
        });
        Route::get("verify", "verifyUI")->name("auth.verifyUI");
        Route::post("verify", "verify")->name("auth.verify");

    });
});



Route::middleware(isAuthenticated::class)->group(function () {
    Route::get('/', [PageController::class, 'home'])->name('page.home');
    Route::prefix('inventory')->controller(ItemController::class)->group(
        function () {
            Route::get('/', 'index')->name('item.index');
            Route::post('/', 'store')->name('item.store');
            Route::get('/create', 'create')->name('item.create');
            Route::get('/{id}', 'show')->name('item.show');
            Route::get('/{id}/edit', 'edit')->name('item.edit');
            Route::put('/{id}', 'update')->name('item.update');
            Route::delete('/{id}', 'destroy')->name('item.destroy');
        }
    );
    Route::resource('category', CategoryController::class);
    Route::prefix('dashboard')->controller(HomeController::class)->group(function () {
        Route::get("home", "home")->name("dashboard.home");
    });
});
