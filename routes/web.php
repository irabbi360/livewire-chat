<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ChatApp;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', ChatApp::class) -> middleware('auth');