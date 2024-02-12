<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MonsterController;
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


Route::get('/', function () {
    return view('pages.home');
})->name('pages.home');

Route::post('/monsters/{monsterId}/favorite', [MonsterController::class, 'addToFavorites'])->middleware(['auth', 'verified'])->name('monsters.favorite');

Route::post('/monsters/{monster}/comments', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comments.store');

Route::post('/monsters/{comment}/delete', [CommentController::class, 'delete'])->middleware(['auth', 'verified'])->name('comments.delete');

Route::get('/recherche-texte', [SearchController::class, 'searchText'])->name('search.text');

Route::get('/recherche-criteres', [SearchController::class, 'searchCriteria'])->name('search.criteria');

Route::get('/addMonster', [MonsterController::class, 'create'])->middleware(['auth', 'verified'])->name('monsters.addMonsters');

Route::post('/monsters', [MonsterController::class, 'store'])->middleware(['auth', 'verified'])->name('monsters.store');

Route::get('/monsters/{monster}/editMonster', [MonsterController::class, 'edit'])->middleware(['auth', 'verified'])->name('monsters.editMonsters');

Route::post('/monsters/{monster}/update', [MonsterController::class, 'updateMonster'])->middleware(['auth', 'verified'])->name('monsters.updateMonster');

Route::delete('/monsters/{monster}/delete', [MonsterController::class, 'deleteMonster'])->middleware(['auth', 'verified'])->name('monsters.deleteMonster');

Route::post('/monsters/{monsterID}/rate', [MonsterController::class, 'rate'])->middleware(['auth', 'verified']);

Route::get('/deck', function () {
    return view('deck._index');
})->name('deck._index');

Route::get('/monsters', function () {
    return view('monsters.index');
})->name('monsters.index');

Route::get('/monsters/{monster}/{slug}', function (\App\Models\Monster $monster) {
    return view('monsters.show', compact('monster'));
})->name('monsters.show');

Route::get('/user', function () {
    return view('users.index');
})->name('users.index');

Route::get('/users/{user}/{slug}', function (\App\Models\User $user) {
    return view('users.show', compact('user'));
})->name('users.show');

Route::get('/dashboard', function () {
    return view('pages.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
