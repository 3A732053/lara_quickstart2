<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

#顯示所有任務
Route::get('/tasks',[TaskController::class,'index']) ->name('tasks.index');
#儲存任務
Route::post('/task',[TaskController::class,'store']) ->name('task.store');
#刪除任務
Route::delete('/task/{task}',[TaskController::class,'destroy']) ->name('task.destroy');
