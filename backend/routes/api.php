<?php

use App\Http\Controllers\TodosManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("todos", [TodosManagement::class, 'index']);
Route::get("todos/{id}", [TodosManagement::class, 'show']);
Route::post('todos', [TodosManagement::class, 'addTodos']);
Route::put('todos/{id}', [TodosManagement::class, 'todoEdit']);
Route::delete('todos/{id}', [TodosManagement::class, 'todoDelete']);


Route::get("filter/{inputValue}", [TodosManagement::class, 'filter']);
Route::get("tests/{id}", [TodosManagement::class, 'showTest']);
Route::delete("tests/{id}", [TodosManagement::class, 'deleteTest']);
Route::get("testsUndone/{id}", [TodosManagement::class, 'showUndoneTest']);
