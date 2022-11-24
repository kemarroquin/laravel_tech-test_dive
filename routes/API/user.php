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


Route::group(
    ['controller' => UserController::class],
    function(){
        
        Route::get('/', function () {
            return response()->json([
                'message' => 'Bad request (something wrong with URL or parameters)'
            ], 400);
        });

        Route::post('/create', 'store');
        Route::put('/update/{id}', 'edit');
        Route::patch('/update/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy');
        Route::get('/all', 'index');
        Route::get('/filter/id/{id}', 'show');
        Route::get('/filter/name/{value}', 'show');
        Route::get('/filter/email/{value}', 'show');
        Route::get('/filter/city/{value}', 'show');
        Route::get('/filter/country/{value}', 'show');
        Route::get('/filter/address/{value}', 'show');
        Route::get('/filter/status/{value}', 'show');

    }
);

Route::fallback(function(){
    return response()->json([
        'message' => 'Bad request (something wrong with URL or parameters)'
    ], 400);
});