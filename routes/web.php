<?php

use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminRoomController;
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

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



//管理員
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('reservations/{id}/edit', [AdminReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::post('reservations', [AdminReservationController::class, 'store'])->name('admin.reservations.store');
    Route::get('reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('rooms/create', [AdminRoomController::class, 'create'])->name('admin.rooms.create');
    Route::patch('rooms/{id}', [AdminRoomController::class, 'update'])->name('admin.rooms.update');
    Route::delete('rooms/{id}', [AdminRoomController::class, 'destroy'])->name('admin.rooms.destroy');
    Route::get('rooms/{id}/edit', [AdminRoomController::class, 'edit'])->name('admin.rooms.edit');
});
