<?php

use App\Http\Controllers\MailRestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRestController;
use App\Http\Controllers\NegocioRestController;
use App\Http\Controllers\PromocionRestController;


//negocio
Route::get('/negocio',[NegocioRestController::class,'index']);
Route::post('/negocio',[NegocioRestController::class,'store']);

//Usuario
Route::get('/user',[UserRestController::class,'index']);

//valida si el usuario existe y su contraseña es correcta
Route::get('/auth_user',[UserRestController::class,'authAutorice']);

//Promociones
Route::get('/promocion',[PromocionRestController::class,'index']);
Route::get('/promocion/{promocion}',[PromocionRestController::class,'show']);
//Role
// to Send a Mail
Route::post('/contactenos',[MailRestController::class,'sendEmail'])->name('contactenos');


/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
