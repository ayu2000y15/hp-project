<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuditionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDataController;
use App\Http\Controllers\Admin\AdminDataEntryController;

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

// ホームページ
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/talent', [TalentController::class, 'index'])->name('talent');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/audition', [AuditionController::class, 'index'])->name('audition');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::post('/talent-show', [TalentController::class, 'show'])->name('talent.show');


// 管理者ページログイン
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login/access', [AdminController::class, 'loginAccess'])->name('login.access');
// 管理者ページログアウト
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

// 管理者ページ
Route::get('/admin', [AdminController::class, 'dashboards'])->name('admin');
Route::get('/admin/data', [AdminDataController::class, 'data'])->name('admin.data');
Route::post('/admin/data/store', [AdminDataController::class, 'storeHeader'])->name('admin.data.storeHeader');
Route::post('/admin/data/update', [AdminDataController::class, 'updateHeader'])->name('admin.data.updateHeader');
Route::delete('/admin/data/delete', [AdminDataController::class, 'deleteHeader'])->name('admin.data.deleteHeader');

Route::get('/admin/data-entry', [AdminDataEntryController::class, 'dataEntry'])->name('admin.data-entry');

Route::get('/admin/store-data-entry', [AdminDataEntryController::class, 'storeDataEntryGet'])->name('admin.data-entry.storeDataEntryGet');
Route::post('/admin/store-data-entry', [AdminDataEntryController::class, 'storeDataEntry'])->name('admin.data-entry.storeDataEntry');
Route::post('/admin/store-data-entry/store', [AdminDataEntryController::class, 'storeData'])->name('admin.data-entry.storeData');

