<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Ceci est le service Auth v2!";
});

/*
je cherche a faire une nuance... why routes de auth service ne fonctionnne nada... ex si j'essaie d'acceder a 

Route::get('/', function () {

    return view('welcome');

}); http://eco-post.local/auth/ j'ai just la page laravel standard mais aussi.... le auth service avec sanctum et tout ca va servir a quoi
*/