<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Fruit\IndexController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\User\StoreController;
use App\Http\Controllers\RaceTrackingController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    // ПОЛУЧИТЬ ИНФОРМАЦИЮ О ЗАБЕГАХ
    Route::get('races', [RaceController::class, 'index']);

    // ПОЛУЧИТЬ ИНФОРМАЦИЮ О КОНКРЕТНОМ ЗАБЕГЕ
    Route::post('races/{id}', [RaceController::class, 'show']);

    // СОЗДАТЬ ЗАБЕГ
    Route::post('races', [RaceController::class, 'store']);

    // УДАЛИТЬ ЗАБЕГ
    Route::delete('races/{id}', [RaceController::class, 'destroy']);
    Route::delete('races', [RaceController::class, 'destroy']);

    // ПРИБАВИТЬ ДИСТАНЦИЮ К ЗАБЕГУ (races_track создаст запись также о коммите)
    Route::patch('races/{id}/commit', [RaceController::class, 'update']);
    Route::patch('races', [RaceController::class, 'update']);

    // Получить расстояние пользователя
    Route::post('trackinfo/{id}', [RaceTrackingController::class, 'index']);

    // Получить информацию для ленты
    Route::post('feed/{raceId}', [RaceTrackingController::class, 'feed']);

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::group(['namespace' => 'Fruit', 'prefix' => 'fruits'], function () {
            Route::get('/', [IndexController::class, 'index']);
        });
    });

});

Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
    Route::post('/', [StoreController::class, 'index']);
});


