<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\PeopleController;
use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\SignController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\BackupController;



Route::get('/', [IndexController::class, 'index']);
Route::post('/test-form-input', [IndexController::class, 'testFormInput']);
Route::patch('/test-form-input', [IndexController::class, 'testFormInput']);

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [RegisterController::class, 'profile']);
    Route::get('/logout', [RegisterController::class, 'logout']);
    Route::get('/logout_all_devices', [RegisterController::class, 'logoutAll']);
    Route::get('/change_password', [RegisterController::class, 'changePassword']);
});

Route::post('people', [PeopleController::class, 'create']);
Route::patch('main_info', [PeopleController::class, 'patchMainInfo']);

Route::post('history', [HistoryController::class, 'create']);
Route::patch('history', [HistoryController::class, 'patch']);
Route::delete('history', [HistoryController::class, 'delete']);

Route::post('sign', [SignController::class, 'create']);
Route::patch('sign', [SignController::class, 'patch']);
Route::post('person/signs', [SignController::class, 'savePersonSigns']);



Route::post('files', [FileController::class, 'upload']);
Route::patch('files', [FileController::class, 'update']);
Route::delete('files', [FileController::class, 'delete']);


Route::get('files_size', [BackupController::class, 'filesSize']);
Route::get('backup', [BackupController::class, 'backup']);
Route::post('backup', [BackupController::class, 'backup']);

Route::get('backup-email-notification', [BackupController::class, 'sendNotification']);
Route::post('backup-email-notification', [BackupController::class, 'sendNotification']);

Route::get('test_infinity_free', [BackupController::class, 'testInfinityFree']);
