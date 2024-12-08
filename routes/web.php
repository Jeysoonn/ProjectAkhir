<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// Route::get('/', function () {
//     return view('UserView.Produk');
// });
Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
});
Route::get('/produk/index', function(){
    return view('admin.produkindex');
});
use App\Http\Controllers\ProdukController;
Route::get('/p', function(){
    return view('userview.landing');
});
Route::get('/admin/produk', [AdminController::class, 'create']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::get('/produk/kategori/{kategori}', [ProdukController::class, 'show'])->name('produk.kategori');
