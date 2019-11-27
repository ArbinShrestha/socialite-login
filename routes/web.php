<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('socialauth/github', 'Auth\LoginController@redirectToGithub');
Route::get('socialauth/github/callback', 'Auth\LoginController@handleGithubCallback');

Route::get('socialauth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('socialauth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('socialauth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('socialauth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');