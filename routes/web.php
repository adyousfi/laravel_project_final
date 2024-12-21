<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

// Route voor de homepagina
Route::get('/', [HomeController::class, 'home']);


Route::get('/dashboard', function () {
    return view('Home.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('admin/dashboard', [HomeController::class, 'index']);
    
  
    Route::get('/view_category', [AdminController::class, 'view_category']);
    
    

    // Toggle admin rechten van een gebruiker
    Route::post('/admin/toggle/{user}', [AdminController::class, 'toggleAdmin']);

    Route::post('/admin/create_user', [AdminController::class, 'createUser'])->name('admin.create_user');
});


require __DIR__.'/auth.php';