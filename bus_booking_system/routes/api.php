<?php

use App\Http\Controllers\bus_detailController;
use App\Http\Controllers\bus_routesController;
use App\Http\Controllers\bus_schedule_bookingsController;
use App\Http\Controllers\bus_schedulesController;
use App\Http\Controllers\bus_seatesController;
use App\Http\Controllers\super_adminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\RoutesTableController;
use App\Http\Controllers\RoutesTableController;

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
//Routes for routes_table
Route::post('/routes_table/add', [RoutesTableController::class,'store']);

Route::get('/routes_table_data', [RoutesTableController::class,'show'] );

Route::get('/routes_table_data/{id}/showId',[RoutesTableController::class,'showId']);

Route::put('/routes_table_data/{id}/update',[RoutesTableController::class,'update'] );

Route::delete('/routes_table_data/{id}/delete',[RoutesTableController::class,'destroy']);
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Routes for bus_routes table

Route::post('/bus_routes/add', [bus_routesController::class,'store']);

Route::get('/bus_routes_data', [bus_routesController::class,'show'] );

Route::get('/bus_routes_data/{id}/showId',[bus_routesController::class,'showId']);

Route::put('/bus_routes_data/{id}/update',[bus_routesController::class,'update'] );

Route::delete('/bus_routes_data/{id}/delete',[bus_routesController::class,'destroy']);

//Routes for bus_detail table
Route::post('/bus_detail/add', [bus_detailController::class,'store']);

Route::get('/bus_detail_data', [bus_detailController::class,'show'] );

Route::get('/bus_detail_data/{id}/showId',[bus_detailController::class,'showId']);

Route::put('/bus_detail_data/{id}/update',[bus_detailController::class,'update'] );

Route::delete('/bus_detail_data/{id}/delete',[bus_detailController::class,'destroy']);

//Routes for bus_detail table
Route::post('/bus_seates/add', [bus_seatesController::class,'store']);

Route::get('/bus_seates_data', [bus_seatesController::class,'show'] );

Route::get('/bus_seates_data/{id}/showId',[bus_seatesController::class,'showId']);

Route::put('/bus_seates_data/{id}/update',[bus_seatesController::class,'update'] );

Route::delete('/bus_seates_data/{id}/delete',[bus_seatesController::class,'destroy']);


//Routes for bus_schedule table
Route::post('/bus_schedules/add', [bus_schedulesController::class,'store']);

Route::get('/bus_schedules_data', [bus_schedulesController::class,'show'] );

Route::get('/bus_schedules_data/{id}/showId',[bus_schedulesController::class,'showId']);

Route::put('/bus_schedules_data/{id}/update',[bus_schedulesController::class,'update'] );

Route::delete('/bus_schedules_data/{id}/delete',[bus_schedulesController::class,'destroy']);

//Routes for bus_schedule_bookings table

Route::post('/bus_schedule_bookings/add', [bus_schedule_bookingsController::class,'store']);

Route::get('/bus_schedule_bookings_data', [bus_schedule_bookingsController::class,'show'] );

Route::get('/bus_schedule_bookings_data/{id}/showId',[bus_schedule_bookingsController::class,'showId']);

Route::put('/bus_schedule_bookings_data/{id}/update',[bus_schedule_bookingsController::class,'update'] );

Route::delete('/bus_schedule_bookings_data/{id}/delete',[bus_schedule_bookingsController::class,'destroy']);

//Routes for super_admin table
Route::post('/super_admin', [super_adminController::class,'store']);

Route::get('/super_admin_data', [super_adminController::class,'show']);

Route::get('/super_admin_data/{id}/showId', [super_adminController::class,'showId']);
Route::put('/super_admin_data/{id}/update', [super_adminController::class,'update']);
Route::delete('/super_admin_data/{id}/delete',  [super_adminController::class,'destroy']);
