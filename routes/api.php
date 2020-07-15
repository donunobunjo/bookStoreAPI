<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

//I implemented admin middleware inside the BookController
Route::apiResource('books', 'BookController');
Route::post('books/{book}/reviews', 'ReviewController@store');

