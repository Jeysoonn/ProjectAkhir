<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// Route::get('/', function () {
//     return view('UserView.Produk');
// });
Route::get('/dashboard', function(){
    return view('admin.dashboard');
});



use App\Http\Controllers\ProdukController;
Route::get('/home', function(){
    return view('user.landing');
});
//admin
Route::get('/produkadmin',[ProdukController::class, 'indexadmin'])->name('index');
Route::get('/produkadmin/{id}/edit', [ProdukController::class, 'edit'])->name('edit');
Route::put('/produkadmin/{id}', [ProdukController::class, 'update'])->name('update');
Route::delete('/produkadmin/{id}', [ProdukController::class, 'destroy'])->name('destroy');
Route::get('/produkadmin/create', [ProdukController::class, 'create'])->name('create');
Route::post('/produkadmin', [ProdukController::class, 'store'])->name('store');
//
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/kategori/{kategori}', [ProdukController::class, 'show'])->name('kategori');




