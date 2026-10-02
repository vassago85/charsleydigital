<?php

use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('/', function () {
    return view('welcome', [
        'projects' => config('work.projects'),
    ]);
})->name('home');

Route::get('/work', [WorkController::class, 'index'])->name('work.index');
Route::get('/work/{slug}', [WorkController::class, 'show'])->name('work.show');

Route::post('/contact', [ContactController::class, 'submit'])
    ->middleware('throttle:10,1')
    ->name('contact.submit');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::prefix('leads')->name('leads.')->group(function () {
        Route::get('/', [LeadController::class, 'index'])->name('index');
        Route::get('/{lead}', [LeadController::class, 'show'])->name('show');
        Route::patch('/{lead}', [LeadController::class, 'update'])->name('update');
        Route::post('/{lead}/notes', [LeadController::class, 'storeNote'])->name('notes.store');
    });

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
});
