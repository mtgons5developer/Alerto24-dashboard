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


    Route::post('/login',[LoginController::class,'customLogin']);
    Route::post('/register',[LoginController::class,'customRegister']);

Route::middleware('TokenVerify')->group(function(){
    Route::post('/login',[UserController::class,'Login']);
    Route::post('/register',[UserController::class,'Register']);
    Route::post('/provinceListing',[UserController::class,'provinceListing']);
    Route::post('/cityListing',[UserController::class,'cityListing']);
    Route::post('/barangayListing',[UserController::class,'barangayListing']);
    Route::post('/serviceCatListing',[UserController::class,'serviceCatListing']);
    Route::post('/request_otp',[UserController::class,'request_otp']);
});


    Route::get('email/verify/{id}',[VerifyEmailController::class,'verify'])->name('verification.verify'); //

Route::middleware('auth:sanctum')->group(function(){
    // Route::post('/me',[LoginController::class,'me']);
    Route::post('/Me',[UserController::class,'Me']);
    Route::get('email/resend', [LoginController::class,'resend'])->name('verification.resend');
    Route::get('/adminByCat/{id}',[UserController::class,'adminByCat']);
    Route::post('/addAdminNotification',[UserController::class,'addAdminNotification']);
    Route::get('/getNotificationList',[UserController::class,'getNotificationList']);
    Route::post('/acceptReject',[UserController::class,'acceptReject']);


});
