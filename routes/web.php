<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinglePLayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\MatchController;

Route::resource('tournaments', TournamentController::class);
Route::resource('matches', MatchController::class);
Route::prefix('admin/teams')->name('admin.teams.')->group(function () {
    Route::get('/', [TeamController::class, 'index'])->name('index');
    Route::get('/teams', [TeamController::class, 'index1'])->name('index1'); // corrected name
    Route::get('/{team}/players', [TeamController::class, 'showPlayers'])->name('showPlayers'); // corrected name

    Route::get('/create', [TeamController::class, 'create'])->name('create');
    Route::post('/store', [TeamController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [TeamController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [TeamController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/add-players', [TeamController::class, 'addPlayers'])->name('addPlayers');
    Route::post('/{id}/store-players', [TeamController::class, 'storePlayers'])->name('storePlayers');
});
Route::delete('admin/teams/{team}/players/{player}', [TeamController::class, 'removePlayer'])->name('admin.teams.removePlayer');

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin/singleplayer')->name('admin.singleplayer.')->group(function () {
    Route::get('/player', [SinglePLayerController::class, 'index'])->name('index');
    Route::get('/sign', [SinglePLayerController::class, 'signUpView'])->name('signUp');
    Route::get('/list', [SinglePLayerController::class, 'list'])->name('list');
    Route::post('/insert', [SinglePLayerController::class, 'store'])->name('insert');
    Route::get('/edit/{id}', [SinglePLayerController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [SinglePLayerController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [SinglePLayerController::class, 'delete'])->name('delete');
});

Route::post('/admin/player/signup', [SinglePLayerController::class, 'signup'])->name('admin.player.signup');
