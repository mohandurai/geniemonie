<?php

use App\Http\Controllers\CMSController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\BDECommisionController;
use App\Http\Controllers\BDEController;
use App\Http\Controllers\CustomerCareController;
use App\Http\Controllers\ContentWriterCommisionController;
use App\Http\Controllers\FranchisesCommissionController;
use App\Http\Controllers\ContentWriterController;
use App\Http\Controllers\FrEmpController;
use App\Http\Controllers\StateManagerCommisionController;
use App\Http\Controllers\StateManagerController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\AdPackageController;
use App\Http\Controllers\PackagediscountController;
use App\Http\Controllers\EnquireController;
use App\Http\Controllers\AdvertiseController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth']], function() {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('home', [HomeController::class, 'index'])->name('home2');

    Route::get('users/{id}/delete', [\App\Http\Controllers\UsersController::class, 'delete']);
    Route::get('users/{id}/roleconvert', [\App\Http\Controllers\UsersController::class, 'roleconvert']);
    Route::post('convert-role', [\App\Http\Controllers\UsersController::class, 'convertRole']);
    Route::post('save-role', [\App\Http\Controllers\UsersController::class, 'saveRole']);
    Route::resource('users', \App\Http\Controllers\UsersController::class);
    Route::post('edit-price/{id}', [\App\Http\Controllers\AdPackageController::class, 'editPrice']);
    Route::post('ad-packages/{id}/edit-item', [\App\Http\Controllers\AdPackageController::class, 'editItem']);
    Route::get('users-status-change/{id}', [\App\Http\Controllers\UsersController::class,'userStatusChange']);
    Route::resource('roles', \App\Http\Controllers\RolesController::class);
    Route::resource('permissions', \App\Http\Controllers\PermissionsController::class);

    Route::post('state-list', [CommonController::class, 'getStateList'])->name('state-list');
    Route::post('district-list', [CommonController::class, 'getDistrictList'])->name('district-list');
    Route::post('city-list', [CommonController::class, 'getCityList'])->name('city-list');
    Route::post('pincode-list', [CommonController::class, 'getPincodeList'])->name('pincode-list');
    Route::post('search-phone-no', [CommonController::class, 'searchPhoneNo'])->name('search-phone-no');
    Route::post('user-details', [CommonController::class, 'userDetails'])->name('user-details');


    Route::resource('state', StateController::class);
    Route::resource('district', DistrictController::class);
    Route::resource('city', CityController::class);

    Route::get('settings', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
    Route::post('update-profile', [\App\Http\Controllers\SettingsController::class, 'updateProfile']);
    Route::post('user-status-change', [HomeController::class, 'userStatusChange'])->name('user-status-change');

    Route::resource('bde', BDEController::class);
    Route::resource('customer-care', CustomerCareController::class);
    Route::resource('state-managers', StateManagerController::class);
    Route::resource('content-writers', ContentWriterController::class);
    Route::resource('state-manager-commission', StateManagerCommisionController::class);
    Route::resource('content-writer-commission', ContentWriterCommisionController::class);
    Route::resource('franchise-commission', FranchisesCommissionController::class);

    Route::resource('bde-commission', BDECommisionController::class);
    Route::resource('ad-packages', AdPackageController::class);
    Route::resource('packagediscount', PackagediscountController::class);
    Route::post('edit-discount/{id}', [\App\Http\Controllers\PackagediscountController::class, 'editDiscount']);
    
    Route::resource('franchises', FranchiseController::class);
    Route::resource('enquires', EnquireController::class);
    // Route::resource('advertise', AdvertiseController::class);
    Route::resource('advertise', \App\Http\Controllers\AdvertiseController::class);
    Route::get('advertise-status-change/{id}', [\App\Http\Controllers\AdvertiseController::class,'advertiseStatusChange']);
    Route::resource('franchises-enquires', \App\Http\Controllers\FranchiseEnquireController::class);
    Route::resource('franchises-emp', FrEmpController::class);
    Route::resource('cms', CMSController::class);

    Route::post('state-status-change', [StateController::class, 'statusChange']);
    Route::post('district-status-change', [DistrictController::class, 'statusChange']);
    Route::post('city-status-change', [CityController::class, 'statusChange']);
    Route::post('pincode-status-change', [PincodeController::class, 'statusChange']);

    Route::resource('call-management', \App\Http\Controllers\CallManagementController::class);
});

