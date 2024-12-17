<?php

use App\Http\Controllers\PaymentController;
use App\Models\Customer;
use App\Models\CustomerCards;
use Faker\Provider\ar_EG\Payment;
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

Route::get('/', function () {
    return view('homePage');
});




Route::prefix('/payment')->group(function () {


    route::post('/initiate',[PaymentController::class,'initiateChargeRequest']);
    route::post('/recurring/initiate',[PaymentController::class,'initiateRecurringRequest']);
    route::get('/response',[PaymentController::class,'handleRedirectResponse']);
    route::post('/fetch-saved-card',[PaymentController::class, 'fetchSavedCard']);

});



