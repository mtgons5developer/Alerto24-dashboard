<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/logout',function(){
    auth()->logout();
});
Route::post('/customLogin', [App\Http\Controllers\Auth\CustomLoginController::class, 'customLogin'])->name('customLogin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('users');
Route::get('/tasks', [App\Http\Controllers\HomeController::class, 'tasks'])->name('tasks');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users_grid');
Route::get('/municipality', [App\Http\Controllers\HomeController::class, 'municipality'])->name('municipality');

Route::prefix('admin')->group(function () {
    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'settings'])->name('settings');
});
