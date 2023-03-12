<?php

use App\Http\Controllers\UserController;
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

Route::resources([
    'users' => UserController::class,
],[
    'except' => ['index', 'create', 'edit'],
    'missing' => function ()
    {
        return response()->json([
            'message' => 'Resource not found.',
        ], 404);
    }
]);
