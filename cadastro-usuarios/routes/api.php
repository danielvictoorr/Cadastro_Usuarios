<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/user', function (Request $request) {
    return (new Users)->createUser($request);
});


Route::get('/user', function (Request $request) {
    return (new Users)->getAllUsers($request);
});

Route::put('/user', function (Request $request) {
    return (new Users)->updateUser($request);
});

Route::post('/createLogin', function (Request $request) {
    return (new Login)->createLogin($request);
});

Route::post('/login', function (Request $request) {
    return (new Login)->login($request);
});
