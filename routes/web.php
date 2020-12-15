<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

    $user = App\User::find(1);

    foreach ($user->tasks as $task) {
        echo $task->name;
    }
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

#顯示所有任務
Route::get('/tasks',[\App\Http\Controllers\TaskController::class],'index') ->name('task.index');
#儲存任務
Route::post('/task',[\App\Http\Controllers\TaskController::class],'store') ->name('task.store');
#刪除任務
Route::delete('/task/{task}',[\App\Http\Controllers\TaskController::class],'destroy') ->name('task.destroy');
