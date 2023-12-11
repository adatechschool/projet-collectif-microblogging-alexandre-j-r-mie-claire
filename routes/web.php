<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    $Users = User::all();    
    return view('index',compact('Users'));
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




Route::get('/createPost/{id}',function($id) {
    return view('createPost', compact('id'));
})->middleware(['auth', 'verified'])->name('createPost');

Route::post('/sendPost',function() {
    return view('createPost');
})->middleware(['auth', 'verified'])->name('sendPost');



Route::get('/monProfil/{id}',function($id) {
    $User = User::find($id);
    


    return view('/monProfil', compact('User'));
})->middleware(['auth', 'verified'])->name('monProfile');
// Route::get('/', function () {
// return view('auth.login');
  
// });

Route::post('/monProfil/{id}',function($id) {
  dd($id);


    return view('/monProfile');
})->middleware(['auth', 'verified'])->name('updateBio');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
