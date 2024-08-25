<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinglePLayerController;

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

