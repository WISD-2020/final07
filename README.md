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

## 初始專案與DB負責的同學


- 初始專案 [3A7320045 李沐恩](https://github.com/3A732045)

- 資料庫及資料表建立、資料表關連  [3A732001 陳東孟](https://github.com/3A632055) [3A732045 李沐恩](https://github.com/3A6732045)

## 額外使用的套件或樣板

- 前台樣板- [hielo](https://templated.co/hielo)

    使畫面看起來不單調，讓此系統深受使用者喜愛

- 後台樣板- [Side Bar](https://startbootstrap.com/templates/simple-sidebar/)

    為製做簡易操作介面，讓管理者輕鬆使用

## 系統復原步驟

1.｜ 複製https://github.com/WISD-2020/final07.git 本系統在GitHub的專案，打開Source tree，點選clone後，輸入以下資料

    。Source Path:https://github.com/WISD-2020/final07.git
    
    。Destination Path:C:\wagon\uwamp\www\final07

2.｜ 打開cmder，切換至專案所在資料夾，cd final07

3.｜ 在cmder輸入以下命令，以復原此系統：

    。composer install
    
    。composer run‐script post‐root‐package‐install
    
    。composer run‐script post‐create‐project‐cmd

4.｜ 將專案打開 在.env檔案內輸入資料庫主機IP、Port、名稱、與帳密如下：

    。DB_HOST=127.0.0.1

    。DB_PORT=33060

    。DB_DATABASE=final07

    。DB_USERNAME=root

    。DB_PASSWORD=root

5.｜ 在cmder輸入以下命令，將所有資料表產生至final03資料庫內

    。php artisan migrate

6.｜ 開啟UwAmp，點選PHPMyAdmin，輸入以下資料後並點擊登入，進入MySQL後，建立新資料庫，名稱為final07，將專案sql資料夾裡的rooms.sql、users.sql、comments.sql、items.sql、reservations.sql匯入

    。資料庫系統:MYSQL

    。伺服器:localhost:33060

    。帳號:root

    。密碼:root

7.｜ 在UwAmp下，點選Apache config，選擇port 8000 ，並在Document Root 輸入{DOCUMENTPATH}/final07/public

## 系統開發人員與工作分配

   -  [3A732045 李沐恩](https://github.com/3A732045)
   
       。後台管理
       
          ．主控台
          ．管理員管理
          ．房間管理
          ．訂單管理
          
         
       


   -  [3A732001 陳東孟](https://github.com/3A732001)
   
       。前台管理
       
          ．首頁
          ．房間一覽
          ．預約房間
          。readme的輸入及排版
          
          
       
       。登入頁面進入前台或後台頁面
       
      
