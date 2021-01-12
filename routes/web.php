<?php

use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
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
})->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//房型
Route::get('rooms',[RoomController::class,'index'])->name('rooms.index');
Route::get('/rooms/{id}', [RoomController::class,'index'])->name('rooms.show');

//購物車
Route::post('carts/store', [CartController::class, 'store'])->name('carts.store');
Route::get('carts', [CartController::class, 'index'])->name('carts.index');
Route::delete('carts/{id}', [CartController::class, 'destroy'])->name('carts.destroy');

//訂房
Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::get('reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::delete('reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

//管理員
Route::prefix('admin')->group(function () {
    //訂單管理
    Route::get('/', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('reservations/{id}/edit', [AdminReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::post('reservations', [AdminReservationController::class, 'store'])->name('admin.reservations.store');
    Route::get('reservations', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
    Route::patch('reservations/{id}', [AdminReservationController::class, 'update'])->name('admin.reservations.update');
    //房間管理
    Route::get('rooms', [AdminRoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('rooms/create', [AdminRoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('rooms/store', [AdminRoomController::class, 'store'])->name('admin.rooms.store');
    Route::patch('rooms/{id}', [AdminRoomController::class, 'update'])->name('admin.rooms.update');
    Route::delete('rooms/{id}', [AdminRoomController::class, 'destroy'])->name('admin.rooms.destroy');
    Route::get('rooms/{id}/edit', [AdminRoomController::class, 'edit'])->name('admin.rooms.edit');
});
