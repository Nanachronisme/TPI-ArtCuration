<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\MustBeAdmin;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Artwork resource demands an additional parameter 
Route::prefix('search')->group(function() {
    Route::get('/artists', [ArtistController::class, 'index'])->name('search.artists');
    Route::get('/artworks', [ArtworkController::class, 'index'])->name('search.artworks');
});

Route::get('/artists/random', [ArtistController::class, 'random'])->name('artists.random');

Route::resource('artists', ArtistController::class)->except(['index']);

//artworks is nested into artist, corresponding uris will be like:
//artists/{artist}/artworks/{artwork}
Route::resource('artists.artworks', ArtworkController::class)->except(['index']);

require __DIR__.'/auth.php';
