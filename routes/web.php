<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;


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
Route::group(["middleware" => ["auth"]], function() {
    Route::get("/posts/index", [PostController::class, "index"])->name('post.index');
    Route::get("/posts/create", [PostController::class, "create"])->name('post.create');
    Route::get("/posts/{post}", [PostController::class, "show"])->name('post.show');
    Route::post("/posts", [PostController::class, "store"])->name('post.store');
    Route::get('/posts/{post}/edit', [PostController::class, "edit"])->name('post.edit');
    Route::put('/posts/{post}', [PostController::class, "update"])->name('post.update');
    Route::delete("/posts/{post}", [PostController::class, "delete"])->name('post.delete');
});

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
