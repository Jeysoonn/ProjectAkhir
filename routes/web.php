<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// Route::get('/', function () {
//     return view('UserView.Produk');
// });
Route::get('/admin/category', function(){
    return view('admin.category');
});
use App\Http\Controllers\ProdukController;
Route::get('/p', function(){
    return view('userview.landing');
});
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/kategori/{kategori}', [ProdukController::class, 'show'])->name('produk.kategori');
