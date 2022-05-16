<?php

use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaypalController;
use App\Models\City;
use App\Models\Region;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\BarangaysController;
use App\Http\Controllers\ProvincesController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\ServiceCategoriesController;
use App\Http\Controllers\UsersController;

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
Route::get('/logout', function () {
    auth()->logout();
});
Route::post('/customLogin', [App\Http\Controllers\Auth\CustomLoginController::class, 'customLogin'])->name('customLogin');
Route::post('/bnbRegistration', [App\Http\Controllers\Auth\CustomRegistrationController::class, 'bnbRegistration'])->name('bnbRegistration');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('users');
Route::get('/tasks', [App\Http\Controllers\HomeController::class, 'tasks'])->name('tasks');
Route::get('/change_email_verification_status', [App\Http\Controllers\HomeController::class, 'change_email_verification_status'])->name('change_email_verification_status');


Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users_grid');
Route::get('/municipality', [App\Http\Controllers\HomeController::class, 'municipality'])->name('municipality');

Route::prefix('admin')->group(function () {


    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'settings'])->name('admin.settings');
    Route::get('/settings/delete/{id}', [App\Http\Controllers\Admin\SettingController::class, 'settings_delete'])->name('admin.settings_delete');
    Route::post('/add-pair', [App\Http\Controllers\Admin\SettingController::class, 'add_pair'])->name('admin.add_pair');
    Route::get('/trade-history', [App\Http\Controllers\Admin\SettingController::class, 'trade_history'])->name('admin.trade.history');
    Route::get('/add-qty', [App\Http\Controllers\Admin\SettingController::class, 'add_qty'])->name('admin.add.qty');
    Route::get('/add-deltaSMA', [App\Http\Controllers\Admin\SettingController::class, 'add_deltaSMA'])->name('admin.add.deltaSMA');
    Route::get('/add-deltaRSI', [App\Http\Controllers\Admin\SettingController::class, 'add_deltaRSI'])->name('admin.add.deltaRSI');
    Route::get('/add-rsiLong', [App\Http\Controllers\Admin\SettingController::class, 'add_rsiLong'])->name('admin.add.rsiLong');
    Route::get('/add-rsiShort', [App\Http\Controllers\Admin\SettingController::class, 'add_rsiShort'])->name('admin.add.rsiShort');
    Route::get('/add-vol', [App\Http\Controllers\Admin\SettingController::class, 'add_volume'])->name('admin.add.vol');
    Route::get('/admin.order_entry', [App\Http\Controllers\Admin\SettingController::class, 'order_entry'])->name('admin.order_entry');
    Route::get('/change_order_entry_status', [App\Http\Controllers\Admin\SettingController::class, 'change_order_entry_status'])->name('change_order_entry_status');
    Route::get('/change_setting_toggle', [App\Http\Controllers\Admin\SettingController::class, 'change_setting_toggle'])->name('change_setting_toggle');
    Route::get('/change_setting_orderType', [App\Http\Controllers\Admin\SettingController::class, 'change_setting_orderType'])->name('change_setting_orderType');
    Route::get('/payment_list', [\App\Http\Controllers\PaymentController::class, 'index'])->name('admin.payment_list');


    Route::get('stripe', [StripeController::class, 'stripe']);
    Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');


    Route::get('paywithpaypal', [PaypalController::class, 'payWithPaypal'])->name('paywithpaypal');
    Route::post('paypal', [PaypalController::class, 'postPaymentWithpaypal'])->name('paypal');
    Route::get('paypal', [PaypalController::class, 'getPaymentStatus'])->name('status');

    Route::group(['prefix' => 'cities'], function () {

        Route::get('/', [CitiesController::class, 'index'])->name('cities.city.index');
        Route::get('/create', [CitiesController::class, 'create'])->name('cities.city.create');
        Route::get('/show/{city}', [CitiesController::class, 'show'])->name('cities.city.show')->where('id', '[0-9]+');
        Route::get('/{city}/edit', [CitiesController::class, 'edit'])->name('cities.city.edit')->where('id', '[0-9]+');
        Route::post('/', [CitiesController::class, 'store'])->name('cities.city.store');
        Route::put('city/{city}', [CitiesController::class, 'update'])->name('cities.city.update')->where('id', '[0-9]+');
        Route::delete('/city/{city}', [CitiesController::class, 'destroy'])->name('cities.city.destroy')->where('id', '[0-9]+');

    });

    Route::group(['prefix' => 'barangays'], function () {
        Route::get('/', [BarangaysController::class, 'index'])->name('barangays.barangay.index');
        Route::get('/create', [BarangaysController::class, 'create'])->name('barangays.barangay.create');
        Route::get('/show/{barangay}', [BarangaysController::class, 'show'])->name('barangays.barangay.show')->where('id', '[0-9]+');
        Route::get('/{barangay}/edit', [BarangaysController::class, 'edit'])->name('barangays.barangay.edit')->where('id', '[0-9]+');
        Route::post('/', [BarangaysController::class, 'store'])->name('barangays.barangay.store');
        Route::put('barangay/{barangay}', [BarangaysController::class, 'update'])->name('barangays.barangay.update')->where('id', '[0-9]+');
        Route::delete('/barangay/{barangay}', [BarangaysController::class, 'destroy'])->name('barangays.barangay.destroy')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'provinces'], function () {
        Route::get('/', [ProvincesController::class, 'index'])->name('provinces.province.index');
        Route::get('/create', [ProvincesController::class, 'create'])->name('provinces.province.create');
        Route::get('/show/{province}', [ProvincesController::class, 'show'])->name('provinces.province.show')->where('id', '[0-9]+');
        Route::get('/{province}/edit', [ProvincesController::class, 'edit'])->name('provinces.province.edit')->where('id', '[0-9]+');
        Route::post('/', [ProvincesController::class, 'store'])->name('provinces.province.store');
        Route::put('province/{province}', [ProvincesController::class, 'update'])->name('provinces.province.update')->where('id', '[0-9]+');
        Route::delete('/province/{province}', [ProvincesController::class, 'destroy'])->name('provinces.province.destroy')->where('id', '[0-9]+');

    });

    Route::group(['prefix' => 'regions'], function () {
        Route::get('/', [RegionsController::class, 'index'])->name('regions.region.index');
        Route::get('/create', [RegionsController::class, 'create'])->name('regions.region.create');
        Route::get('/show/{region}', [RegionsController::class, 'show'])->name('regions.region.show')->where('id', '[0-9]+');
        Route::get('/{region}/edit', [RegionsController::class, 'edit'])->name('regions.region.edit')->where('id', '[0-9]+');
        Route::post('/', [RegionsController::class, 'store'])->name('regions.region.store');
        Route::put('region/{region}', [RegionsController::class, 'update'])->name('regions.region.update')->where('id', '[0-9]+');
        Route::delete('/region/{region}', [RegionsController::class, 'destroy'])->name('regions.region.destroy')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'service_categories'], function () {
        Route::get('/', [ServiceCategoriesController::class, 'index'])->name('service_categories.service_category.index');
        Route::get('/create', [ServiceCategoriesController::class, 'create'])->name('service_categories.service_category.create');
        Route::get('/show/{serviceCategory}', [ServiceCategoriesController::class, 'show'])->name('service_categories.service_category.show')->where('id', '[0-9]+');
        Route::get('/{serviceCategory}/edit', [ServiceCategoriesController::class, 'edit'])->name('service_categories.service_category.edit')->where('id', '[0-9]+');
        Route::post('/', [ServiceCategoriesController::class, 'store'])->name('service_categories.service_category.store');
        Route::put('service_category/{serviceCategory}', [ServiceCategoriesController::class, 'update'])->name('service_categories.service_category.update')->where('id', '[0-9]+');
        Route::delete('/service_category/{serviceCategory}', [ServiceCategoriesController::class, 'index'])->name('service_categories.service_category.destroy')->where('id', '[0-9]+');

    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.user.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.user.create');
        Route::get('/show/{user}', [UsersController::class, 'show'])->name('users.user.show');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.user.edit');
        Route::post('/', [UsersController::class, 'store'])->name('users.user.store');
        Route::put('user/{user}', [UsersController::class, 'update'])->name('users.user.update');
        Route::delete('/user/{user}', [UsersController::class, 'destroy'])->name('users.user.destroy');

    });
});


Route::get('/task', function (\Illuminate\Http\Request $request) {
    $database = app('firebase.database');
    $reference = $database->getReference('users');
    $city_names = $database->getReference('address_lookup/regions')->getValue();
    $records = (object)$reference->getValue();
    foreach ($city_names as $city_name) {
        $city_name = (object)$city_name;
        Region::create(['name' => $city_name->region_name, 'code' => $city_name->region_code, 'psgc_code' => $city_name->psgc_code]);
    }
});


