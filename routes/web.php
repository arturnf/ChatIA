<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


Route::get('/', [MainController::class, 'index']);
Route::get('/chat', [MainController::class, 'chat'])->name('chat');
Route::post('/api/chat/send', [ChatController::class, 'sendMessage']);
