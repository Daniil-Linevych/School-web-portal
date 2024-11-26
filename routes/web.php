<?php


use App\Http\Controllers\PollsController;
use App\Http\Controllers\PupilsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/authenticate', [UserController::class, 'authenticate']);

Route::get('/pupil/{pupil}', [PupilsController::class, 'index']);

Route::get('/schedule/{pupil}/{weekday}', [ScheduleController::class, 'index']);

Route::get('/polls/{pupil}', [PollsController::class, 'index']);

Route::post('/polls/{pupil}', [PollsController::class, 'store']);




