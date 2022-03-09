<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'posts' => Posts::paginate(6)
    ]);
})->name('home');

Route::get('/support', function () {
    return view('support');
})->name('support');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::post('/support', function () {
    return redirect()->back()->with('msg', ['warning', 'Not implemented yet!']);
});

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('notauth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/auth', [UserController::class, 'auth'])->name('auth')->middleware('notauth');

Route::resource('user', UserController::class)->only(['create', 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/search/category', [PostsController::class, 'search_category'])->name('search.category');
    Route::get('/search/category/result', [PostsController::class, 'search_category_post'])->name('search.category.post');
    Route::get('/search/title', [PostsController::class, 'search_title'])->name('search.title');
    Route::get('/search/title/result', [PostsController::class, 'search_title_post'])->name('search.title.post');

    Route::resource('post', PostsController::class)->except(['index', 'show']);
    Route::get('/user/posts/list', [PostsController::class, 'userlist'])->name('post.list');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class)->except(['create', 'store']);
    Route::get('/admin/posts/list', [PostsController::class, 'adminlist'])->name('admin.post.list');
});

Route::resource('post', PostsController::class)->only(['index', 'show']);
