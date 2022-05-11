<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SchedulerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['api', 'auth:api', 'check_min_level:5']
], function ($router) {
    $router->put('/user', [UserController::class, 'createUser']);
    $router->post('/user', [UserController::class, 'editUser']);
    $router->post('/group/merge', [UserController::class, 'mergeGroup']);

    $router->post('/group', [MainController::class, 'updateGroup']);
    $router->post('/subject', [MainController::class, 'updateSubject']);
    $router->post('/cabinet', [MainController::class, 'updateCabinet']);
});

Route::group([
    'middleware' => ['api', 'auth:api', 'check_min_level:2'],
], function ($router) {
    $router->get('/', [UserController::class, 'getUser']);

    $router->get('/grades/{user_id}', [GradeController::class, 'getStudentGrades'])->middleware('check_relationship');
    $router->get('/homework/{user_id}', [HomeworkController::class, 'getStudentHomework'])->middleware('check_relationship');
    $router->get('/scheduler/{user_id}', [SchedulerController::class, 'getStudentScheduler'])->middleware('check_relationship');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    $router->post('/login', [AuthController::class, 'AuthUser']);
    $router->get('/', [AuthController::class, 'FetchUserSession']);
});