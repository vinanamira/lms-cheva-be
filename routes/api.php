<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\PengumpulanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SilabusController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;

Route::middleware('api')->group(function () {
    Route::post('auth/login', [AuthController::class, 'login'])->name('login');

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::group(['prefix' => 'auth'], function () {
            Route::get('/user', [AuthController::class, 'user']);
            Route::post('/logout', [AuthController::class, 'logout']);
        });

        Route::group(['middleware' => 'admin'], function () {
            // Routes untuk entitas Mentor
            Route::get('/mentor', [MentorController ::class, 'index']);
            Route::get('/mentor/{user_id}', [MentorController ::class, 'show']);
            Route::post('/mentor', [MentorController ::class, 'store']);
            Route::put('/mentor/{user_id}', [MentorController ::class, 'edit']);
            Route::put('/mentor/{user_id}/change-password', [MentorController ::class, 'changePassword']);
            Route::delete('/mentor/{user_id}', [MentorController ::class, 'destroy']);
        });

        Route::group(['middleware' => 'mentor'], function () {
            // Routes untuk entitas Divisi
            Route::get('/divisi', [DivisiController::class, 'index']);
            Route::post('/divisi', [DivisiController::class, 'store']);
            Route::get('/divisi/{id}', [DivisiController::class, 'show']);
            Route::put('/divisi/{id}', [DivisiController::class, 'update']);
            Route::delete('/divisi/{id}', [DivisiController::class, 'destroy']);

            // Routes untuk entitas Silabus
            Route::get('/silabus', [SilabusController::class, 'index']);
            Route::post('/silabus', [SilabusController::class, 'store']);
            Route::get('/silabus/{id}', [SilabusController::class, 'show']);
            Route::put('/silabus/{id}', [SilabusController::class, 'update']);
            Route::delete('/silabus/{id}', [SilabusController::class, 'destroy']);

            // Routes untuk entitas Materi
            Route::get('/materi', [MateriController::class, 'index']);
            Route::post('/materi', [MateriController::class, 'store']);
            Route::get('/materi/{id}', [MateriController::class, 'show']);
            Route::put('/materi/{id}', [MateriController::class, 'update']);
            Route::delete('/materi/{id}', [MateriController::class, 'destroy']);

            // Routes untuk entitas Tugas
            Route::get('/tugas', [TugasController::class, 'index']);
            Route::post('/tugas', [TugasController::class, 'store']);
            Route::get('/tugas/{id}', [TugasController::class, 'show']);
            Route::put('/tugas/{id}', [TugasController::class, 'update']);
            Route::delete('/tugas/{id}', [TugasController::class, 'destroy']);

            Route::get('/murid', [MuridController ::class, 'index']);
            Route::get('/murid/{user_id}', [MuridController ::class, 'show']);
            Route::post('/murid', [MuridController ::class, 'store']);
            Route::put('/murid/{user_id}', [MuridController ::class, 'edit']);
            Route::put('/murid/{user_id}/change-password', [MuridController ::class, 'changePassword']);
            Route::delete('/murid/{user_id}', [MuridController ::class, 'destroy']);
        });
    });

    // Routes untuk entitas Pengumpulan
    Route::get('/pengumpulan', [PengumpulanController::class, 'index']);
    Route::post('/pengumpulan', [PengumpulanController::class, 'store']);
    Route::get('/pengumpulan/{id}', [PengumpulanController::class, 'show']);
    Route::put('/pengumpulan/{id}', [PengumpulanController::class, 'update']);
    Route::delete('/pengumpulan/{id}', [PengumpulanController::class, 'destroy']);

    // Routes untuk entitas Role
    Route::get('/role', [RoleController::class, 'index']);
    Route::post('/role', [RoleController::class, 'store']);
    Route::get('/role/{id}', [RoleController::class, 'show']);
    Route::put('/role/{id}', [RoleController::class, 'update']);
    Route::delete('/role/{id}', [RoleController::class, 'destroy']);

    // Routes untuk entitas User
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
});