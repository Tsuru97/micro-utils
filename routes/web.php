<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Rutas de administración
Route::group(['prefix' => 'admin'], function() {
    Auth::routes(['register' => false]); // Desactivar registro para admins

    Route::middleware('auth')->group(function() {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('admin.root');
        Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');
    });
});

// Rutas de Traducción Públicas
Route::get('index/{locale}', [App\Http\Controllers\HubController::class, 'lang'])->name('lang');
Route::get('/api/search', [App\Http\Controllers\HubController::class, 'search'])->name('search.tools');

// Rutas de Sitemap Dinámico
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// Rutas Públicas (MicroUtils Hub)
Route::get('/', [App\Http\Controllers\HubController::class, 'index'])->name('home');
Route::get('/privacy-policy', [App\Http\Controllers\HubController::class, 'privacy'])->name('privacy');
Route::get('/terms-of-service', [App\Http\Controllers\HubController::class, 'terms'])->name('terms');
Route::get('/about-us', [App\Http\Controllers\HubController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HubController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\HubController::class, 'contactSubmit'])->name('contact.submit');

Route::get('/tool/{slug}', [App\Http\Controllers\ToolController::class, 'show'])->name('tool.show');
Route::get('/category/{slug}', [App\Http\Controllers\HubController::class, 'category'])->name('category.show');

// Update User Details (protegidas por auth en HomeController)
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
