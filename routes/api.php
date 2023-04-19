<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/employee', [EmployeeController::class, 'index']);
Route::post('/save', [EmployeeController::class, 'store']);
Route::put('/update/{id}', [EmployeeController::class, 'update']);
Route::delete('/destroy/{id}', [EmployeeController::class, 'destroy']);


// Route::resource('employee',EmployeeController::class)->only(['index','store','show','update','destroy']);

// Route::middleware('api')->group(function () {
//     Route::resource('employee', EmployeeController::class);
// });
 

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


