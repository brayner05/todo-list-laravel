<?php

use App\Http\Controllers\TodoItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TodoItemController::class, 'index']);
Route::post('/todos', [TodoItemController::class, 'store']);
Route::delete('/todos/{id}', [TodoItemController::class, 'destroy']);
