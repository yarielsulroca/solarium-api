<?php

use App\Http\Controllers\MailRestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicioRestController ;
use App\Http\Controllers\UserRestController;
use App\Http\Controllers\TipoServicioRestController;
use App\Http\Controllers\NegocioRestController;
use App\Http\Controllers\PromocionRestController;

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

//Servicio

//negocio
Route::get('/negocio',[NegocioRestController::class,'index']);
Route::post('/negocio',[NegocioRestController::class,'store']);
Route::get('/negocio/{negocio}',[NegocioRestController::class,'show']);
Route::put('/negocio/{service}',[NegocioRestController::class,'update']);
Route::delete('/negocio/{negocio}',[NegocioRestController::class,'destroy']);
//TipoServicio

//Usuario

//valida si el usuario existe y su contraseña es correcta
Route::get('/auth_user',[UserRestController::class,'authAutorice'])->name('auth_user');
//Promociones
Route::get('/promocion',[PromocionRestController::class,'index']);
Route::get('/promocion/{promocion}',[PromocionRestController::class,'show']);
Route::post('/promocion',[PromocionRestController::class,'store']);
Route::put('/promocion/{promocion}',[PromocionRestController::class,'update']);
Route::delete('/promocion/{promocion}',[PromocionRestController::class,'destroy']);
//Role
// to Send a Mail
Route::post('/contactenos',[MailRestController::class,'sendEmail'])->name('contactenos');


/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
