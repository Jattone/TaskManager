<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/health', function () {
    return response()->json([
        'healthy' => true
    ]);
});

Route::get('tasks/status', [TaskController::class, 'tasksByStatus']);
Route::get('tasks/assignee', [TaskController::class, 'tasksByAssignee']);

Route::resources([
    'users'          => UserController::class,
    'tasks'          => TaskController::class,
],[
    'except' => ['index', 'create', 'edit'],
    'missing' => function ()
    {
        return response()->json([
            'message' => 'Resource not found.',
        ], 404);
    }
]);


