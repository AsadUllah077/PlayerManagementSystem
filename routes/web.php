<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinglePLayerController;
use App\Http\Controllers\TeamController;

Route::prefix('admin/teams')->name('admin.teams.')->group(function () {
    Route::get('/', [TeamController::class, 'index'])->name('index');
    Route::get('/teams', [TeamController::class, 'index1'])->name('admin.teams.index1');
    Route::get('/create', [TeamController::class, 'create'])->name('create');
    Route::post('/store', [TeamController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [TeamController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [TeamController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/add-players', [TeamController::class, 'addPlayers'])->name('addPlayers');
    Route::post('/{id}/store-players', [TeamController::class, 'storePlayers'])->name('storePlayers');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/singleplayer', [SinglePLayerController::class, 'index'])->name('admin.singleplayer');
Route::get('admin/singleplayer/sign', [SinglePLayerController::class, 'signUpView'])->name('admin.signUp');
Route::get('admin/singleplayer/list', [SinglePLayerController::class, 'list'])->name('admin.singleplayer.list');
Route::post('admin/singleplayer/insert', [SinglePLayerController::class, 'store'])->name('admin.singleplayer.insert');
Route::get('admin/singleplayer/edit/{id}', [SinglePLayerController::class, 'edit'])->name('admin.singleplayer.edit');
Route::put('admin/singleplayer/update/{id}', [SinglePLayerController::class, 'update'])->name('admin.singleplayer.update');
Route::delete('admin/singleplayer/delete/{id}', [SinglePLayerController::class, 'delete'])->name('admin.singleplayer.delete');
Route::post('/admin/player/signup', [SinglePLayerController::class, 'signup'])->name('admin.player.signup');


