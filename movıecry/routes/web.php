<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\PlayController;
use App\Http\Controllers\EpgController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\FragmanController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ListActorsController;
use App\Http\Controllers\ListDirectorsController;
use App\Http\Controllers\ListMoviesController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;

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

Route::get('/channelview', [ChannelController::class, 'channelAdd'])->name('channelview');
Route::get('/channel-channelShow/{ctime}', [ChannelController::class, 'channelShow'])->name('channel.channelShow');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/channelAdd', [TvController::class, 'channelAdd'])->name('channelAdd');
    Route::get('/channel-add', [TvController::class, 'channelCreate'])->name('channel.channelCreate');
    Route::post('/channel-channelStore', [TvController::class, 'channelStore'])->name('channel.channelStore');
    Route::get('/channel-channelEdit/{ctime}', [TvController::class, 'channelEdit'])->name('channel.channelEdit');
    Route::put('/channel-channelUpdate/{ctime}', [TvController::class, 'channelUpdate'])->name('channel.channelUpdate');
    Route::get('/channel-channelDelete/{id}', [TvController::class, 'channelDestroy'])->name('channel.channelDelete');
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

Route::get('/movies', [ListMoviesController::class, 'index'])->name('movies');
Route::get('/movie/{id}', [ListMoviesController::class, 'show'])->name('movie');
Route::get('/genre/{genre}', [ListMoviesController::class, 'genre'])->name('genre');

Route::get('/directors', [ListDirectorsController::class, 'index'])->name('directors');
Route::get('/director/{id}', [ListDirectorsController::class, 'show'])->name('director');

Route::get('/actors', [ListActorsController::class, 'index'])->name('actors');
Route::get('/actor/{id}', [ListActorsController::class, 'show'])->name('actor');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('/dashboard/movies', MovieController::class);
    Route::resource('/dashboard/directors', DirectorController::class);
    Route::resource('/dashboard/genres', GenreController::class);
    Route::resource('/dashboard/actors', ActorController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});
