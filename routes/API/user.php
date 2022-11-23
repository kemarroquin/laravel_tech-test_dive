<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API User's Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/**/

Route::group(
    ['controller' => UserController::class],
    function(){
        
        Route::get('/', function (Request $request) {
            return json_encode(['Request' => $request, 'Error Code:' => '404']);
        });

    }
);

Route::fallback(function(){
    return response()->json([
        'message' => 'Bad request (something wrong with URL or parameters)'
    ], 400);
});