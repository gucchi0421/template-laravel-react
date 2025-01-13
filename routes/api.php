<?php

declare(strict_types=1);

use App\Http\Controllers\HelloController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/hello', [HelloController::class, 'index']);

Route::controller(TaskController::class)->group(function (): void {
    Route::get('/tasks', 'index');
    Route::post('/task', 'store');
    Route::get('/task/{id}', 'show');
    Route::put('/task/{id}', 'update');
    Route::delete('/task/{id}', 'destroy');
});
