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

        Route::get('/all', 'index');
        Route::post('/create', 'store');
        Route::put('/update/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy');
        Route::get('/filter/id/{id}', 'showById');
        Route::get('/filter/firstname/{firstname}', 'showByFirstname');
        Route::get('/filter/lastname/{lastname}', 'showByLastname');
        Route::get('/filter/email/{email}', 'showByEmail');
        Route::get('/filter/phone/{phone}', 'showByPhone');
        Route::get('/filter/birthdate/{birthdate}', 'showByBirthdate');
        Route::get('/filter/gender/{gender}', 'showByGender');
        Route::get('/filter/city/{city}', 'showByCity');
        Route::get('/filter/country/{country}', 'showByCountry');
        Route::get('/filter/address/{address}', 'showByAddress');
        Route::get('/filter/status/{status}', 'showByStatus');

    }
);

Route::fallback(function(){
    return response()->json([
        'message' => 'Bad request (something wrong with URL or parameters)'
    ], 400);
});