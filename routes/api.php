<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VidioController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//post urls

Route::post('/post/createTag', [PostController::class, 'createTag']);
Route::post('/vidio/createTag', [VidioController::class, 'createTag']);

Route::post('/posts/getTags', [TagController::class, 'getPostTags']);
Route::post('/vidios/getVidioTags', [TagController::class, 'getVidioTags']);
