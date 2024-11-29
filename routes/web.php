<?php

use App\Http\Controllers\sendMailController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [sendMailController::class, 'showForm']);
Route::post('/send-mail', [sendMailController::class, 'sendMailToUser'])->name('send.email');