<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    auth()->logout();
    return view('welcome');
});

//Login y register
Route::get('/loginview', [LoginController::class,'Loginview'])->name('loginview');

Route::get('/login', [LoginController::class,'Login'])->name('login');

Route::get('/cierre', [LoginController::class,'Cierre'])->name('cierre');

Route::post('/register', [LoginController::class,'Register'])->name('register');


Route::get('/cal', [AccountController::class,'Index'])->name('cal.index')->middleware('auth');
Route::get('/oauth', [AccountController::class,'Oauth'])->name('oauthCallback')->middleware('auth');


Route::group(['prefix' => 'Eventos'], function () {

    Route::get('/Listevent',[EventController::class,'Listevent'])->name('Listevent')->middleware('auth');

    Route::get('/Cargareventos',[EventController::class,'Cargarevento'])->name('Cargareventos')->middleware('auth');

    Route::post('/savecalendar',[EventController::class,'Store'])->name('savecalendar');

    Route::get('/showcalendar/{idevent}',[EventController::class,'Show'])->name('showcalendar')->middleware('auth');

    Route::put('/updatecalendar/{idevent}',[EventController::class,'Update'])->name('updatecalendar')->middleware('auth');

    Route::delete('/deletecalendar/{idevent}',[EventController::class,'Delete'])->name('deletecalendar')->middleware('auth');

});