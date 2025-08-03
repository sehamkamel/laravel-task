<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

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

// راوتس CRUD العادية باستخدام Resource Controller
Route::resource('notes', NoteController::class);

// صفحة عرض الملاحظات المحذوفة (سلة المهملات)
Route::get('notes/trash', [NoteController::class, 'trash'])->name('notes.trash');

// استرجاع ملاحظة من سلة المهملات
Route::put('notes/{id}/restore', [NoteController::class, 'restore'])->name('notes.restore');

// حذف نهائي للملاحظة من سلة المهملات
Route::delete('notes/{id}/force-delete', [NoteController::class, 'forceDelete'])->name('notes.forceDelete');

// الصفحة الرئيسية (يمكن تعديله حسب مشروعك)
Route::get('/', function () {
    return view('welcome');
});
