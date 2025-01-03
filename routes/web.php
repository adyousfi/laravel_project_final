<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;

// Route voor de homepagina
Route::get('/', [HomeController::class, 'home'])->name('home');

// Route voor de contactpagina
Route::view('/contact', 'Home.contact')->name('contact');


// Dashboard gebruikt nu dezelfde home-methode
Route::get('/dashboard', [HomeController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    // Admin dashboard route aangepast om contactberichten te tonen
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/view_category', [AdminController::class, 'view_category'])->name('admin.view_category');

    // Toggle admin rechten van een gebruiker
    Route::post('/admin/toggle/{user}', [AdminController::class, 'toggleAdmin']);

    Route::post('/admin/create_user', [AdminController::class, 'createUser'])->name('admin.createUser');

    // FAQ Categories
    Route::resource('admin/faq_categories', FaqCategoryController::class)->except(['show']);
    
    // FAQs
    Route::resource('admin/faqs', FaqController::class)->names([
        'index' => 'admin.faqs.index',
        'create' => 'admin.faqs.create',
        'store' => 'admin.faqs.store',
        'edit' => 'admin.faqs.edit',
        'update' => 'admin.faqs.update',
        'destroy' => 'admin.faqs.destroy',
    ]);

    // Route voor het beantwoorden van contactberichten 
    Route::post('admin/contact-messages/{contactMessage}/reply', [AdminController::class, 'replyContactMessage'])->name('admin.contact_messages.reply');
});

// Publieke route voor het bekijken van de FAQ-pagina
Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');

// Route voor contact us
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

require __DIR__.'/auth.php';
