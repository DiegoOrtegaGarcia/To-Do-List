<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::match(["get", "post"], "/task", [TaskController::class, "index"])->name("task");
    Route::get("/task/create", [TaskController::class, "create"])->name("task.create");
    Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
    Route::post("/task", [TaskController::class, "search"])->name("task.search");
    Route::get("/task/edit/{id}", [TaskController::class, "edit"])->name("task.edit");
    Route::put("/task/update/{id}", [TaskController::class, "update"])->name("task.update");
    Route::delete("/task/delete/{id}", [TaskController::class, "destroy"])->name("task.delete");
    Route::get("/task/show/{id}", [TaskController::class, "show"])->name("task.show");
    Route::put("/task/end/{id}", [TaskController::class, "end"])->name("task.end");
    Route::get("/task/completed", [TaskController::class, "completed"])->name("task.completed");
});
require __DIR__ . '/auth.php';
