<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

/*
（コメント部分は省略）
*/

Route::get('/', [TasksController::class, 'index']);
Route::resource('tasks', TasksController::class);

/*
Route::get('/test-dom', function () {
    try {
        $dom = new \DOMDocument();
        return 'DOMDocument is available';
    } catch (\Throwable $e) {
        return 'Error: ' . $e->getMessage();
    }
});

*/