<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',function() {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');


Route::get('/post',function() {
    return view('post');
})->middleware(['auth', 'verified'])->name('post');

Route::get('/profil',function() {
    return view('profil');
})->middleware(['auth', 'verified'])->name('profil');

Route::get('/catégories',function() {
    return view('category');
})->middleware(['auth', 'verified'])->name('category');

Route::get('/monProfil',function() {
    return view('monProfil');
})->middleware(['auth', 'verified'])->name('monProfil');


Route::post('/createPost/{id}',function() {
    return view('createPost');
})->middleware(['auth', 'verified'])->name('createPost');


// Route::get('/', function () {
// return view('auth.login');
  
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
