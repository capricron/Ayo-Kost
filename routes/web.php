<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\MyKostController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'Home']);

Route::get("/kost/{slug}", [KostController::class, 'show']);

Route::group(['middleware' => "auth"], function(){
    Route::get('/pembayaran/{slug}/{id}', [PembayaranController::class, 'index']);

    Route::post('/pembayaran/{slug}/{id}', [PembayaranController::class, 'bayar']);

    Route::get('/mykost', [MyKostController::class, 'index']);
});

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::get("/register", [AuthController::class, 'register']);

Route::post("/register", [AuthController::class, 'makeAccount']);

Route::post("/login", [AuthController::class, 'authLogin']);

Route::get("/logout", [AuthController::class, 'logout']);

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function () {
    Route::get("/", [KostController::class, 'index']);

    Route::get("/kost-ku/tambah", [DashboardController::class, 'addKost']);
    Route::post("/kost-ku/tambah", [KostController::class, 'store']);

    Route::post("/kost-ku/edit/{slug}", [KostController::class, 'update']);
    Route::get("/kost-ku/{slug}", [KostController::class, 'show']);
    Route::get("/kost-ku/edit/{slug}", [KostController::class, 'edit']);
    Route::get("/kost-ku/{id}/{status}", [PembayaranController::class, 'updatePembayaran']);

    Route::get("/penghuni", [DashboardController::class, 'penghuni']);
    Route::get("/penghuni/{id}", [DashboardController::class, 'editKost']);

    Route::get("/pembayaran", [PembayaranController::class, 'pembayaran']);
    Route::get("/pembayaran/{id}", [PembayaranController::class, 'detailPembayaran']);
    Route::get("/pembayaran/{id}/{status}", [PembayaranController::class, 'updatePembayaran']);

});


