<?php

use App\Http\Controllers\NegocioController;
use App\Http\Controllers\PromocionController;
use App\Mail\ContactanosMailLabel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
/* Route::get('/contactanos', function ()
{
    Mail::to('sulroca@gmail.com')->send(new ContactanosMailLabel);
    return "Correo enviado 2, desde Laravel";
})->name('contactanos'); */

Auth::routes();

Route::resource('promociones', PromocionController::class);

Route::get('/negocio',[NegocioController::class,'index'])->name('negocio-index');
Route::post('/negocio',[NegocioController::class,'store'])->name('negocio-store');
Route::get('/negocio/{negocio}',[NegocioController::class,'show'])->name('negocio-show');
Route::put('/negocio/{service}',[NegocioController::class,'update'])->name('negocio-update');
Route::delete('/negocio/{negocio}',[NegocioController::class,'destroy'])->name('negocio-destroy');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
