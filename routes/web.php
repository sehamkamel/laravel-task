<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

// 🔹 Routes مخصصة (لازم تكون قبل resource)
Route::get('notes/search', [NoteController::class, 'search'])->name('notes.search');
Route::get('notes/trash', [NoteController::class, 'trash'])->name('notes.trash');
Route::put('notes/{id}/restore', [NoteController::class, 'restore'])->name('notes.restore');
Route::delete('notes/{id}/force-delete', [NoteController::class, 'forceDelete'])->name('notes.forceDelete');

// 🔹 Routes CRUD العادية باستخدام Resource Controller
Route::resource('notes', NoteController::class);

// 🔹 الصفحة الرئيسية (welcome)
Route::get('/', function () {
    return view('welcome');
});
