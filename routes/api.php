<?php




//Route::apiResource('/list', App\Http\Controllers\UserController::class);
//
//Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
//
//
//Route::group(['middleware' => 'auth:api'], function () {
//
//    Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout']);
//    Route::post('refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
//    Route::post('me', [App\Http\Controllers\AuthController::class, 'me']);
//});



Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

//    Route::post('login', 'AuthController@login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
//    Route::post('logout', 'AuthController@logout');
//    Route::post('refresh', 'AuthController@refresh');
//    Route::post('me', 'AuthController@me');

});



?>
