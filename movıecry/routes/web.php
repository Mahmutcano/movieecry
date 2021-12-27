<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\EpgController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ListGenreController;
use App\Http\Controllers\GenreController;



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


Route::get('/', [PageController::class, 'index'])->name('all.post');
Route::get('/post-show/{slug}', [PageController::class, 'show'])->name('post.show');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/index', [PostController::class, 'index'])->name('index');
    Route::get('/post-add', [PostController::class, 'create'])->name('post.create');
    Route::post('/post-store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post-edit/{slug}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post-update/{slug}', [PostController::class, 'update'])->name('post.update');
    Route::get('/post-delete/{id}', [PostController::class, 'destroy'])->name('post.delete');
});



Route::get('movieplay', [MovieController::class, 'mindex'])->name('all.movie');
Route::get('/movie-mshow/{mname}', [MovieController::class, 'mshow'])->name('movie.mshow');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/mindex', [PlayController::class, 'mindex'])->name('mindex');
    Route::get('/movie-add', [PlayController::class, 'mcreate'])->name('movie.mcreate');
    Route::post('/movie-store', [PlayController::class, 'mstore'])->name('movie.mstore');
    Route::get('/movie-edit/{mname}', [PlayController::class, 'medit'])->name('movie.medit');
    Route::put('/movie-update/{mname}', [PlayController::class, 'mupdate'])->name('movie.mupdate');
    Route::get('/movie-delete/{id}', [PlayController::class, 'mdestroy'])->name('movie.mdelete');
});

Route::get('epglist', [EpgController::class, 'eindex'])->name('all.epg');
Route::get('/epg-eshow/{ename}', [EpgController::class, 'eshow'])->name('epg.eshow');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/eindex', [ProgramController::class, 'eindex'])->name('eindex');
    Route::get('/epg-add', [ProgramController::class, 'ecreate'])->name('epgs.ecreate');
    Route::post('/epg-store', [ProgramController::class, 'epgstore'])->name('epgs.epgstore');
    Route::get('/epg-edit/{ename}', [ProgramController::class, 'eedit'])->name('epgs.eedit');
    Route::put('/epg-update/{ename}', [ProgramController::class, 'eupdate'])->name('epgs.eupdate');
    Route::get('/epg-delete/{id}', [ProgramController::class, 'edestroy'])->name('epgs.edelete');
});

Route::get('/search', [ListGenreController::class, 'gindex'])->name('all.genre');
Route::get('/genre-gshow/{name}', [ListGenreController::class, 'gshow'])->name('genres.gshow');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/gindex', [GenreController::class, 'gindex'])->name('gindex');
    Route::get('/genre-add', [GenreController::class, 'gcreate'])->name('genres.gcreate');
    Route::post('/genre-store', [GenreController::class, 'gstore'])->name('genres.gstore');
    Route::get('/genre-edit/{name}', [GenreController::class, 'gedit'])->name('genres.gedit');
    Route::put('/genre-update/{name}', [GenreController::class, 'gupdate'])->name('genres.gupdate');
    Route::get('/genre-delete/{id}', [GenreController::class, 'gdestroy'])->name('genres.gdelete');
});

Route::get('/channelview', [ChannelController::class, 'cindex'])->name('all.channel');
Route::get('/channel-cshow/{cname}', [ChannelController::class, 'cshow'])->name('channel.cshow');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/cindex', [TvController::class, 'cindex'])->name('cindex');
    Route::get('/channel-add', [TvController::class, 'ccreate'])->name('channel.ccreate');
    Route::post('/channel-store', [TvController::class, 'cstore'])->name('channel.cstore');
    Route::get('/channel-edit/{cname}', [TvController::class, 'cedit'])->name('channel.cedit');
    Route::put('/channel-update/{cname}', [TvController::class, 'cupdate'])->name('channel.cupdate');
    Route::get('/channel-delete/{id}', [TvController::class, 'cdestroy'])->name('channel.cdelete');
});
