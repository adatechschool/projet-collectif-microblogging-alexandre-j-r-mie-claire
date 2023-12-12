<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;

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



Route::get('/', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('index');

Route::post('/', [PostController::class, 'store'])->middleware(['auth', 'verified'])->name('createStore');


Route::get('/post', function () {
    return view('post');
})->middleware(['auth', 'verified'])->name('post');

Route::get('/profil', function () {
    return view('profil');
})->middleware(['auth', 'verified'])->name('profil');

Route::get('/catégories', function () {
    return view('category');
})->middleware(['auth', 'verified'])->name('category');




Route::get('/createPost/{id}', function ($id) {
    return view('createPost', compact('id'));
})->middleware(['auth', 'verified'])->name('createPost');

Route::post('/sendPost', function () {
    return view('createPost');
})->middleware(['auth', 'verified'])->name('sendPost');



Route::get('/monProfil/', function () {
    $id = Auth::user()->id;
    $User = User::find($id);
    $Posts = $User->posts()->get();



    return view('/monProfil', compact('User','Posts'));
})->middleware(['auth', 'verified'])->name('monProfile');
// Route::get('/', function () {
// return view('auth.login');

// });

Route::get('/profil/{id}',[ProfileController::class, 'profil'])->middleware(['auth', 'verified'])->name('profile');


     



Route::post('/monProfil/', function () {
    Auth::user()->id;


    return view('/monProfil');
})->middleware(['auth', 'verified'])->name('updateBio');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
