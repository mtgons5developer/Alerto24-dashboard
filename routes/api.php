<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\VerifyEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//
//});

// Route::post('/login',[LoginController::class,'customLogin']);
// Route::post('/register',[LoginController::class,'customRegister']);
Route::post('/login',[UserController::class,'Login']);
Route::post('/register',[UserController::class,'Register']);
Route::get('/provinceListing',[UserController::class,'provinceListing']);
Route::get('/cityListing',[UserController::class,'cityListing']);
Route::get('/barangayListing',[UserController::class,'barangayListing']);
// Route::post('/register',[LoginController::class,'customRegister']);
Route::get('email/verify/{id}',[VerifyEmailController::class,'verify'])->name('verification.verify'); // Make sure to keep this as your route name


Route::middleware('auth:sanctum')->group(function(){
    // Route::post('/me',[LoginController::class,'me']);
    Route::post('/Me',[UserController::class,'Me']);
    Route::get('email/resend', [LoginController::class,'resend'])->name('verification.resend');
});
