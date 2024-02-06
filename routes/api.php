<?php

use App\Http\Controllers\MailRestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NegocioRestController;
use App\Http\Controllers\PromocionRestController;


//negocio
Route::get('/negocio',[NegocioRestController::class,'index']);


//Promociones
Route::get('/promocion',[PromocionRestController::class,'index']);

// to Send a Mail
Route::post('/contactenos',[MailRestController::class,'sendEmail'])->name('contactenos');


/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
