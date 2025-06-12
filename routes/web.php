<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

/*
（コメント部分は省略）
*/

Route::get('/', [TaskController::class, 'index']);
Route::resource('tasks', TaskssController::class);
