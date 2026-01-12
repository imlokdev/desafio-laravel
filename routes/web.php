<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
})->name('homepage');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('/tasks/{task}', [TaskController::class, 'archive'])->name('tasks.archive');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');

Route::get('/archives', [TaskController::class, 'trash'])->name('tasks.trash');
Route::put('/archives/{task}', [TaskController::class, 'restore'])->name('tasks.restore')->withTrashed();
Route::delete('/archives/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy')->withTrashed();

Route::get('/.well-known/discord', function () {
    return Response::make('dh=ff3a218acc8af838cb6c85fba1904de6505d43d5', 200, [
        'Content-Type' => 'text/plain'
    ]);
});