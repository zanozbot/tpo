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
    return view('pages.welcome');
})->name('home');

Route::get('/admin', 'AdministratorController@index')->name('admin');
Route::post('/admin', 'AdministratorController@create')->name('admin_create_user');

Route::get('/plan', function(){
	return view('pages.plan');
})->name('plan');

Route::get('/users', function() {
	return App\Uporabnik::all();
})->name('users');

// Primer uporabe relacij
Route::get('/test', function() {
	return App\Uporabnik::first()->vloga->ime;
});

Route::get('/register', function(){
	return view('pages.register');
})->name('register');

Route::get('/contact', function(){
	return view('pages.contact');
})->name('contact');

Route::get('/nalog', 'DelovniNalogController@index')->name('nalog');
Route::post('/nalog', 'DelovniNalogController@create')->name('create_nalog');

Route::get('/seznamNalogov', 'SeznamNalogovController@index')->name('seznamNalogov');

Route::get('/newPassword', 'newPasswordController@index')->name('newPassword');