<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;

/* ── Public ─────────────────────────────────────────── */
Route::get('/',              [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}',     [BlogController::class, 'show'])->name('blog.show');
Route::get('/blogs/filter',  [BlogController::class, 'filter'])->name('blog.filter');

/* ── Admin Auth ─────────────────────────────────────── */
Route::get('/admin/login',   [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login',  [AdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

/* ── Admin Panel (session-protected) ────────────────── */
Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('/dashboard',         [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/blogs',             [AdminController::class, 'index'])->name('admin.blogs.index');
    Route::get('/blogs/create',      [AdminController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs',            [AdminController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{id}/edit',   [AdminController::class, 'edit'])->name('admin.blogs.edit');
    Route::post('/blogs/{id}',       [AdminController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{id}',     [AdminController::class, 'destroy'])->name('admin.blogs.destroy');
});
