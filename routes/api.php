<?php


use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\VerifyEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::post('/login', [UserController::class, 'Login']);
Route::post('/register', [UserController::class, 'Register']);


Route::get('/provinceListing', [UserController::class, 'provinceListing']);
Route::get('/cityListing', [UserController::class, 'cityListing']);
Route::get('/barangayListing', [UserController::class, 'barangayListing']);
Route::get('email/verify/{id}', [VerifyEmailController::class, 'verify'])->name('verification.verify'); // Make sure to keep this as your route name
Route::resource('service_categories', App\Http\Controllers\API\ServiceCategoryAPIController::class);


Route::apiResource('users', UserController::class);

Route::middleware('auth:sanctum')->group(function () {
    // Route::post('/me',[LoginController::class,'me']);
    Route::post('/Me', [UserController::class, 'Me']);
    Route::get('email/resend', [LoginController::class, 'resend'])->name('verification.resend');
});


