<?php

use Illuminate\Support\Facades\Route;
//
// ****
use App\Http\Controllers\GateController;
// ****
//

Route::get('/', function () {
    return view('welcome');
});



//
// ****
Route::get('/gate-entry',[GateController::class,'index']);

Route::post('/check-employee',[GateController::class,'checkEmployee']);

Route::get('/gate-verification',[GateController::class,'gatePage']);

Route::post('/verify-gate',[GateController::class,'verifyGate']);

Route::get('/welcome',[GateController::class,'welcome']);
// ****
//
// Route::get('/generate-gate',[GateController::class,'generateGate']);
// Final code
Route::get('/gate-admin/{gate}',[GateController::class,'gateAdmin']);
Route::get('/generate-gate/{gate}', [GateController::class,'generateGate']);
// Final code
// new
Route::get('/gate-codes',[GateController::class,'getGateCodes']);
Route::get('/dashboard',[GateController::class,'dashboard']);
// new
