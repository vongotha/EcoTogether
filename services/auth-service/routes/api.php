<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/health', fn() => response()->json(
    ['status' => 'OK']
));

Route::middleware('auth:sanctum')->get('/verify', function (Request $request) {
    return $request->user();
});
