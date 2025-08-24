<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Use plural and lowercase for resource routes
Route::apiResource('authors', App\Http\Controllers\AuthorController::class);
Route::apiResource('books', App\Http\Controllers\BookController::class);

Route::get('/test', function () {
    return ['status' => 'ok'];
});
