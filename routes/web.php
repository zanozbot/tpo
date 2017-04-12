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

// Prijava
Route::get('/', function () {
    return view('pages.welcome');
})->name('home');
Route::post('/', 'UporabnikController@login')->name('login');

// Middleware skrbi, da mora biti uporabnik prijavljen
//Route::group(['middleware' => ['je.prijavljen']], function () {
	// Uporabnik
    Route::get('/newPassword', 'newPasswordController@index')->name('newPassword');
	Route::post('/newPassword', 'newPasswordController@change_password')->name('change_password');
	Route::get('/odjava', 'UporabnikController@logout')->name('odjava');

	// Administrator
	Route::get('/admin', 'AdministratorController@index')->name('admin');
	Route::post('/admin', 'AdministratorController@create')->name('admin_create_user');

	// Plan
	Route::get('/plan', function(){
		return view('pages.plan');
	})->name('plan');
	Route::get('/datumplan', 'DatumPlanController@index')->name('datumPlan');
	Route::post('/datumplan', 'DatumPlanController@create')->name('create_datumPlan');
	Route::get('/plan', 'PlanController@index')->name('plan');
	Route::get('/plan/dodaj/{sifraPlan}/{sifraObiska}', 'PlanController@dodaj')->name('dodaj_plan');

	// Nalog
	Route::get('/nalog', 'DelovniNalogController@index')->name('nalog');
	Route::post('/nalog', 'DelovniNalogController@create')->name('create_nalog');
	Route::get('/seznamNalogov', 'SeznamNalogovController@index')->name('seznamNalogov');
//});

// Registracija
Route::get('/register', function(){
	return view('pages.register');
})->name('register');
Route::get('/email', 'RegistrationController@register')->name('register_post');
Route::get('/confirm-account/{token}', 'RegistrationController@confirm')->name('confirm-account');

Route::get('/contact', function(){
	return view('pages.contact');
})->name('contact');
