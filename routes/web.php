<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArticlesController;

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
    return view('welcome');
});

Route::get('/test', function () {
    return view('test', ['name' => request('name')]);
});

/* Route::get('/posts/{post}', function ($post) {
    $posts =[
        'my-first-post' => 'Hello, this is my first post!',
        'my-second-post' => 'Now I am getting the hang of this blogging thing.'
    ];

    if (! array_key_exists($post, $posts)){
        abort(404, 'Sorry, that post was not found.');
    }

    return view('post', ['post'=>$posts[$post]]);
}); */

Route::get('/posts/{post}', [PostsController::class, 'show']);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/welcome_template', function () {
    return view('welcome_template');
});

Route::get('/about_template', function () {
    return view('about_template', ['articles' => App\Models\Article::take(3)->latest('created_at')->get()]);
});

Route::get('/articles_template', [ArticlesController::class, 'index'])->name('articles.index');
Route::post('/articles_template', [ArticlesController::class, 'store']);
Route::get('/articles_template/create', [ArticlesController::class, 'create']);
Route::get('/articles_template/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles_template/{article}/edit', [ArticlesController::class, 'edit']);
Route::put('/articles_template/{article}', [ArticlesController::class, 'update']);
