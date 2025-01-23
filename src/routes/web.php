<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// お問い合わせフォーム関連
Route::get('/', [ContactController::class, 'index'])->name('contacts.index'); // 入力ページ
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm'); // 確認ページ
Route::post('/store', [ContactController::class, 'store'])->name('contacts.store'); // データ保存
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contacts.thanks'); // サンクスページ

Route::get('/register', [RegisterController::class, 'create'])->name('register.create'); // 登録フォーム表示
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');  // 登録処理

// 管理画面関連
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index'); // 管理画面
Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show'); // 詳細表示
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy'); // 削除処理
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');

// ログイン関連
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // ログインフォーム
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // ログアウト