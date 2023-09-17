<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

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

Route::middleware(['languages'])->group(function () {
    Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/empresa', [Controllers\CompanyController::class, 'index'])->name('company');
    Route::get('/blog/{category?}', [Controllers\BlogController::class, 'index'])->name('blog');
    Route::get('/post/{slug}', [Controllers\BlogController::class, 'details'])->name('blog.details');
    Route::get('/contato', [Controllers\ContactController::class, 'index'])->name('contact');
    Route::get('/politica-de-privacidade', [Controllers\PrivacyController::class, 'index'])->name('privacy');

    Route::get('/en', [Controllers\HomeController::class, 'index'])->name('en.home');
    Route::get('/en/company', [Controllers\CompanyController::class, 'index'])->name('en.company');
    Route::get('/en/blog/{category?}', [Controllers\BlogController::class, 'index'])->name('en.blog');
    Route::get('/en/post/{slug}', [Controllers\BlogController::class, 'details'])->name('en.blog.details');
    Route::get('/en/contact', [Controllers\ContactController::class, 'index'])->name('en.contact');
    Route::get('/en/privacy-policy', [Controllers\PrivacyController::class, 'index'])->name('en.privacy');
    
    Route::get('/es', [Controllers\HomeController::class, 'index'])->name('es.home');
    Route::get('/es/empresa', [Controllers\CompanyController::class, 'index'])->name('es.company');
    Route::get('/es/blog/{category?}', [Controllers\BlogController::class, 'index'])->name('es.blog');
    Route::get('/es/post/{slug}', [Controllers\BlogController::class, 'details'])->name('es.blog.details');
    Route::get('/es/contacto', [Controllers\ContactController::class, 'index'])->name('es.contact');
    Route::get('/es/politica-de-privacidad', [Controllers\PrivacyController::class, 'index'])->name('es.privacy');
});

// Rotas da restrita que ficam sem o middleware de autorização
Route::match(['get', 'post'], '/restrita/password/send-recovery', [Controllers\Restrita\PasswordRecoveryController::class, 'sendRecovery'])
    ->name('platform.password.send-recovery');

Route::match(['get', 'post'], '/restrita/password/recover-password/{id}', [Controllers\Restrita\PasswordRecoveryController::class, 'recoverPassword'])
    ->name('platform.password.recover-password');
