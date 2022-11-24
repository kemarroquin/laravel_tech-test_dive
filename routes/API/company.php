<?php

use App\Http\Controllers\API\CompanyController;
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
    ['controller' => CompanyController::class],
    function(){
        
        Route::get('/', function () {
            return response()->json([
                'message' => 'Bad request (something wrong with URL or parameters)'
            ], 400);
        });

        Route::get('/all', 'index');
        Route::post('/create', 'store');
        Route::put('/update/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy');
        Route::get('/filter/id/{id}', 'showById');
        Route::get('/filter/name/{value}', 'showByName');
        Route::get('/filter/email/{value}', 'showByEmail');
        Route::get('/filter/phone/{value}', 'showByPhone');
        Route::get('/filter/city/{value}', 'showByCity');
        Route::get('/filter/country/{value}', 'showByCountry');
        Route::get('/filter/address/{value}', 'showByAddress');
        Route::get('/filter/status/{value}', 'showByStatus');

    }
);

Route::fallback(function(){
    return response()->json([
        'message' => 'Bad request (something wrong with URL or parameters)'
    ], 400);
});