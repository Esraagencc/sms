<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\telegramController;
use App\Http\Controllers\smsController;
use App\Http\Controllers\gorevlerController;
use App\Http\Controllers\mailController;


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


/*Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/
Route::get('/telegramgonder', [telegramController::class,'telegramGonder']);
Route::get('/smsgonder', [smsController::class,'smsGonder']);

Route::get('/gorev-ekle',[gorevlerController::class,'gorev']);
Route::post('/gorev-ekle',[gorevlerController::class,'gorev_ekle'])->name('gorev_ekle');
Route::get('/mailgonder',[mailController::class,'mailgonder']);


