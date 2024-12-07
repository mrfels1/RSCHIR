<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

use App\Http\Controllers\DrawerController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SortingController;
use App\Http\Controllers\BooksAndAuthorsController;
use App\Http\Controllers\DisplaySessionsController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //пр 5
    Route::get('/cookies',[CookiesController::class,'show'])->name('cookies');
    Route::get('/upload-file', [UploadController::class, 'show'])->name('upload-file');
    Route::post('/save-file', [UploadController::class, 'store'])->name('save-file');
    Route::get('/get-files', [UploadController::class, 'getFiles'])->name('get-files');
});

//пр 2
Route::get('/drawer', [DrawerController::class, 'show'])->name('drawer');
Route::get('/sorting', [SortingController::class, 'show'])->name('sorting');

//пр 3
Route::get('/books', [BooksAndAuthorsController::class, 'books'])->name('books');
Route::get('/author/{id}', [BooksAndAuthorsController::class, 'author'])->name('author');



require __DIR__.'/auth.php';
