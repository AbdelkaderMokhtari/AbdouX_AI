<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;


Route::get('/', function () {
    return view('home');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/skills', function () {
    return view('skills');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/chatbot', function () {
    return view('chatbot');
});


Route::post('/chat', [ChatbotController::class, 'chat']);
