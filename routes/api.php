<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('test', function () {
    return "this test action";
});

Route::get('categories' , [CategoryController::class , 'index']);
Route::post('categories' , [CategoryController::class , 'store']);
Route::put('categories/{id1}' , [CategoryController::class , 'update']);
Route::delete('categories/{id}' , [CategoryController::class , 'destroy']);
Route::get('categories/{id}' , [CategoryController::class , 'show']);

// Route::apiResource('books' , BookController::class)->except('show');
// Route::apiResource('books' , BookController::class)->only('index' ,'show');
Route::apiResource('books' , BookController::class);
Route::get('books-by-title' , [BookController::class , 'getByTitle']);
Route::get('books-by-category' , [BookController::class , 'getByCategory']);

Route::apiResource('authors' , AuthorController::class);
