<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CommonController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\BdeenquiryController;
use App\Http\Controllers\AuthController;

Route::get('/send-email', [LoginController::class, 'sendEmail']);

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


Route::controller(CommonController::class)->group(function (){
    Route::get('get-working-status', 'getWorkingStatus');
    Route::get('get-state', 'getState');
    Route::get('get-district/{stateId}', 'getDistrict');
    Route::get('get-city/{stateId}/{districtId}', 'getCity');
    Route::get('get-pincode/{cityId}', 'getPincode');
    Route::post('get-location', 'getLocation');
});

Route::controller(RegisterController::class)->group(function(){
    Route::post('user-register', 'userRegister');
    Route::post('register', 'register');
    Route::post('franchise-inquiry', 'franchiseInquiry');
});


Route::controller(LoginController::class)->group(function(){
    // Route::post('send-otp', 'sendOtp');
    // Route::post('otp-verify', 'otpVerify');
    // Route::post('enter-name', 'enterName');
    // Route::post('enter-location', 'enterLocation');
    Route::get('cms', 'cms');
    Route::get('user-status/{userId}', 'userStatus');

});

Route::post('/send-otp', [LoginController::class, 'sendOtp']);
Route::post('/otp-verify', [LoginController::class, 'otpVerify']);
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
    Route::post('/bde-enquiry', [BdeenquiryController::class, 'bdeEnquiry']);
    Route::post('/franch-enquiry', [BdeenquiryController::class, 'franchEnquiry']);
    Route::post('/advt-enquiry', [BdeenquiryController::class, 'advtEnquiry']);
    Route::post('/enter-name', [LoginController::class, 'enterName']);
    Route::post('/enter-location', [LoginController::class, 'enterLocation']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
