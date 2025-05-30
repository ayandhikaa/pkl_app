<?php

use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use Illuminate\Support\Facades\App;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Livewire\Fe\Industri\Index;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified','role:siswa','check_user_email'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('/industri', Index::class)->name('industri');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
