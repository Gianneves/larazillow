<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\UserAccountController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [IndexController::class, 'index']);
Route::get('/hello', [IndexController::class, 'show']);


Route::resource('listing', ListingController::class)
    ->only(['index', 'show']);

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)->only(['create', 'store']);

Route::prefix('realtor')
    ->name('realtor.')
    ->middleware('auth')
    ->group(function () {
        Route::name('listing.restore')->put('listing/{listing}/restore', [
            RealtorListingController::class, 'restore'])->withTrashed();
        Route::resource('listing', RealtorListingController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
            ->withTrashed();
        Route::resource('listing.image', RealtorListingImageController::class)->only(['create', 'store']);
    });


