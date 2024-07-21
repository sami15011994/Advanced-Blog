<?php

    use Illuminate\Support\Facades\Route;
    
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

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

//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//Route::get('/posts/create', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/home', [PostController::class, 'home'])->name('posts.home');
Route::get('posts/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/show', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/contact',  [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact',  [ContactController::class, 'send'])->name('contact.send');
/*

Route::get('posts/about',  [PostController::class, 'about'])->name('posts.about');

Route::get('posts/articles',  [PostController::class, 'articles'])->name('posts.articles');
*/
Route::resource('posts', PostController::class)->except(['index']);    




require __DIR__.'/auth.php';
