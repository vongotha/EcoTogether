<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return response()->json([
		'message' => 'Bienvenue sur ECO APP Service',
		'status' => 'Online',
		'version' => '2.0'
	]);
});
require __DIR__.'/auth.php';
