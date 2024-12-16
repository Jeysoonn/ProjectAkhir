<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', function(){
    return view('user.landing');
});
Route::get('/', function () {
    return view('user.landing');
})->name('landing');

Route::get('/login', function(){
    return view('login.login');
});
//admin
use App\Http\Controllers\ProdukController;
Route::get('/produkadmin',[ProdukController::class, 'indexadmin'])->name('index');
Route::get('/produkadmin/{id}/edit', [ProdukController::class, 'edit'])->name('edit');
Route::put('/produkadmin/{id}', [ProdukController::class, 'update'])->name('update');
Route::delete('/produkadmin/{id}', [ProdukController::class, 'destroy'])->name('destroy');
Route::get('/produkadmin/create', [ProdukController::class, 'create'])->name('create');
Route::post('/produkadmin', [ProdukController::class, 'store'])->name('store');
//
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/kategori/{kategori}', [ProdukController::class, 'show'])->name('kategori');

//Auth
use App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'doLogin'])->name('dologin');;
Route::post('register', [AuthController::class, 'doRegister']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', [AuthController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/guest-dashboard', [AuthController::class, 'guestDashboard'])->name('user.landing');
});

use App\Http\Controllers\OrderController;

Route::post('/keranjang/tambah/{id}', [OrderController::class, 'tambahKeKeranjang'])->name('keranjang.tambah');
Route::get('/keranjang', [OrderController::class, 'keranjang'])->name('keranjang');
Route::delete('/keranjang/hapus/{id}', [OrderController::class, 'hapusDariKeranjang'])->name('keranjang.hapus');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

Route::post('/keranjang', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/pembayaran/id}', [OrderController::class, 'pembayaran'])->name('pembayaran');

Route::get('/user/ordershistory', [OrderController::class, 'showOrderHistory'])->name('user.orders');
// Route::get('/user/order', [OrderController::class, 'showUserOrders'])->name('user.orders');



