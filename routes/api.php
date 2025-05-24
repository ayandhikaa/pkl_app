<?php

use Illuminate\Http\Request;
use app\Livewire\Fe\Guru;
use Illuminate\Support\Facades\Route;
use  App\Livewire\Fe\Siswa;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('guru', 'app\Livewire\Fe\Guru\Index');
Route::apiResource('siswa', 'App\Livewire\Fe\Siswa\Index');
Route::apiResource('industri', 'app\Livewire\Fe\Industri\Index');