<?php

use App\Http\Controller\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route:get('users', [UsersCOntroller::class, 'getUsers']);

// Route::get('users/{id}', [UsersCOntroller::class, 'getUserByuId']);

// add product
Route::post('login', [UsersCOntroller::class, 'loginUser']);
// Route::post('register', 'AuthController@register');

// upddate product by id
// Route::put('updateUser/{id}', [UsersCOntroller::class, 'updateUser']);

// // delete product by id
// Route::delete('deleteUser/{id}', [UsersCOntroller::class, 'deleteUser']);
