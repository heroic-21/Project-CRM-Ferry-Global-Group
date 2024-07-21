<?php

use App\Http\Controllers\DataPelangganController;
use App\Http\Controllers\DataTiketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;

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

require __DIR__ . '/auth.php';

Route::group(['prefix' => '/', 'middleware'=>'auth'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');

    //Aksi Tiket Handle Tiket Admin
    Route::get('apps/tickets', [DataTiketController::class, 'index'])->name('backTiket');
    Route::put('tickets/{id_tiket}', [DataTiketController::class, 'update'])->name('tickets.update');
    Route::delete('tickets/{id_tiket}', [DataTiketController::class, 'destroy'])->name('tickets.delete');

    Route::get('apps/pelanggan', [DataPelangganController::class, 'index'])->name('backPelanggan');

    //Menu Handle Admin
    Route::get('/home', fn()=>view('index'))->name('home');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
