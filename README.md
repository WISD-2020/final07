## 系統名稱 
### 曙晨民宿訂房系統


## 系統畫面

### 房間一覽

<a href="https://i.imgur.com/CZgijmr.jpeg"><img src="https://i.imgur.com/CZgijmr.jpeg" title="source: imgur.com" /></a>

### 房間管理

<a href="https://i.imgur.com/YLE6LoD.png"><img src="https://i.imgur.com/YLE6LoD.png" title="source: imgur.com" /></a>
<a href="https://i.imgur.com/7V5XbBL.png"><img src="https://i.imgur.com/7V5XbBL.png" title="source: imgur.com" /></a>
<a href="https://i.imgur.com/Daeb6dP.png"><img src="https://i.imgur.com/Daeb6dP.png" title="source: imgur.com" /></a>

### 訂單管理

<a href="https://i.imgur.com/5sendGy.png"><img src="https://i.imgur.com/5sendGy.png" title="source: imgur.com" /></a>
<a href="https://i.imgur.com/yWMvzfj.png"><img src="https://i.imgur.com/Daeb6dP.png" title="source: imgur.com" /></a>

## 系統的主要功能

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//房型
Route::get('/rooms',[RoomController::class,'index'])->name('rooms.index');
Route::get('/rooms/{id}', [RoomController::class,'index'])->name('rooms.show');

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
    //房間管理
    Route::get('rooms', [AdminRoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('rooms/create', [AdminRoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('rooms/store', [AdminRoomController::class, 'store'])->name('admin.rooms.store');
    Route::patch('rooms/{id}', [AdminRoomController::class, 'update'])->name('admin.rooms.update');
    Route::delete('rooms/{id}', [AdminRoomController::class, 'destroy'])->name('admin.rooms.destroy');
    Route::get('rooms/{id}/edit', [AdminRoomController::class, 'edit'])->name('admin.rooms.edit');
});

- 

## ERD

<a href="https://i.imgur.com/izoyHjJ.png"><img src="https://i.imgur.com/izoyHjJ.png" title="source: imgur.com" /></a>

## 關聯式綱要圖

<a href="https://i.imgur.com/HVTfWhd.png"><img src="https://i.imgur.com/HVTfWhd.png" title="source: imgur.com" /></a>
