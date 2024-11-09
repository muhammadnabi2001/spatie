<?php

use App\Http\Controllers\KitobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('mainpage',[PostController::class,'main'])->name('mainpage');
Route::get('post',[PostController::class,'post'])->name('post')->middleware('can:post');
Route::get('postcreate',[PostController::class,'postcreate'])->name('postcreate')->middleware('can:postcreate');
Route::post('poststore',[PostController::class,'store'])->name('poststore')->middleware('can:poststore');
Route::get('postedit{post}',[PostController::class,'postedit'])->name('postedit')->middleware('can:postedit');
Route::post('postupdate{post}',[PostController::class,'update'])->name('postupdate')->middleware('can:postupdate');
Route::get('postdelete{post}',[PostController::class,'delete'])->name('postdelete')->middleware('can:postdelete');

Route::get('kitob',[KitobController::class,'kitob'])->name('kitob')->middleware('can:kitob');
Route::get('kitobcreate',[KitobController::class,'kitobcreate'])->name('kitobcreate')->middleware('can:kitobcreate');
Route::post('kitobstore',[KitobController::class,'store'])->name('kitobstore')->middleware('can:kitobstore');
Route::get('kitobedit{kitob}',[KitobController::class,'edit'])->name('kitobedit')->middleware('can:kitobedit');
Route::post('kitobupdate{kitob}',[KitobController::class,'update'])->name('kitobupdate')->middleware('can:kitobupdate');
Route::get('kitobdelete{kitob}',[KitobController::class,'delete'])->name('kitobdelete')->middleware('can:kitobdelete');
