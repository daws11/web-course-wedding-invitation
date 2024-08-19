<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::post('/send-comment', [CommentController::class, 'send']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/guests', [AdminController::class, 'store'])->name('admin.guests.store');
Route::delete('/admin/guests/{id}', [AdminController::class, 'deleteGuest'])->name('admin.guests.delete');
Route::delete('/admin/comments/{id}', [AdminController::class, 'deleteComment'])->name('admin.comments.delete');

Route::get('/{slug?}', [PageController::class, 'index'])->name('guests.show');

