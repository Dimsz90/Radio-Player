<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController; 

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\NotifikasismsController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'books'], function(){
    Route::get('/',[BookController::class,'index'])->name('books'); 
    Route::get('create',[BookController::class,'create'])->name('books.create'); 
    Route::post('store',[BookController::class, 'store'])->name('books.store'); 
    Route::delete('{book}/destroy',[BookController::class, 'destroy'])->name('books.destroy');
    Route::get('{book}/edit',[BookController::class, 'edit'])->name('books.edit');
    Route::patch('{book}/update',[BookController::class,'update'])->name('books.update');
    Route::get('books/report', [BookController::class, 'report'])->name('books.report');
    Route::get('rekap', [BookController::class,'rekap' ])->name('books.rekap');

});

Route::group(['prefix' => 'category'], function(){
Route::get('create', [CategoryController::class, 'create'])->name('category.create');
Route::post('store', [CategoryController::class, 'store'])->name('category.store');
});

Route::group(['prefix' => 'user'], function(){
    Route::get('/',[UserController::class,'index'])->name('user'); 
    Route::get('create', [UserController::class, 'create'])->name('user.create');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('{user}/edit',[UserController::class, 'edit'])->name('user.edit');
    Route::patch('{user}/update',[UserController::class,'update'])->name('user.update');
    Route::delete('{user}/destroy',[UserController::class, 'destroy'])->name('user.destroy');
    });
    Route::group(['prefix' => 'cetak'], function(){
        Route::get('/index',[CetakController::class,'index'])->name('cetak');
        Route::get('/detail/{id}',[CetakController::class,'detail'])->name('cetak.detail');
        Route::get('/kartu/{id}',[CetakController::class,'kartu'])->name('cetak.kartu');
    });
    
Route::group(['prefix' => 'peminjaman'],function(){
    Route::get('/borrowing',[PeminjamanController::class,'index'])->name('peminjaman');
    Route::get('create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('all', [PeminjamanController::class,'all' ])->name('peminjaman.all');
    Route::get('periode', [PeminjamanController::class,'periode' ])->name('peminjaman.periode');
});

 
    
    Route::group(['prefix' =>  'notifikasi'], function(){
        Route::get('informasi/{borrowing}',[NotifikasismsController::class, 'create'])->name('notifikasi.informasi');
    
        Route::post('denda/{borrowing}',[NotifikasismsController::class, 'denda'])->name('notifikasi.denda');
        Route::post('rimainder/{borrowing}',[NotifikasismsController::class, 'rimainder'])->name('notifikasi.rimainder');
    });

    Route::group(['prefix' => 'pengembalian'], function(){
        Route::get('index', [PengembalianController::class,'index'])->name('pengembalian');
        Route::get('create/{borrowing}', [PengembalianController::class,'create'])->name('pengembalian.create');
        Route::post('store/{borrowing}', [PengembalianController::class, 'store'])->name('pengembalian.store');
        Route::get('all', [PengembalianController::class,'all' ])->name('pengembalian.all');
        Route::get('periode', [PengembalianController::class,'periode' ])->name('pengembalian.periode');
        Route::get('show',[PengembalianController::class,'show'])->name('pengembalian.show');
    });
    
