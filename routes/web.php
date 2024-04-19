<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Counter;
use App\Livewire\CreatePost;
use App\Livewire\DynamicForm;
use App\Livewire\PasswordGenerator;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/counter', Counter::class);
Route::get('/create-post', CreatePost::class);
Route::get('/password-generator', PasswordGenerator::class);
Route::get('/dynamic-form', DynamicForm::class);
Route::get('/event-users', function () {
    return "event-users";
})->name('event.users');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
