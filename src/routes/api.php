<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::resource('adm_folder_colors', App\Http\Controllers\API\adm_folder_colorsAPIController::class)
//     ->except(['create', 'edit']);

// Route::resource('adm_category_colors', App\Http\Controllers\API\adm_category_colorsAPIController::class)
//     ->except(['create', 'edit']);

// Route::resource('categories', App\Http\Controllers\API\categoriesAPIController::class)
//     ->except(['create', 'edit']);

// Route::resource('tags', App\Http\Controllers\API\tagsAPIController::class)
//     ->except(['create', 'edit']);

// Route::resource('folders', App\Http\Controllers\API\foldersAPIController::class)
//     ->except(['create', 'edit']);

Route::resource('pivot_users_flags', App\Http\Controllers\API\pivot_users_flagsAPIController::class)
    ->except(['create', 'edit']);