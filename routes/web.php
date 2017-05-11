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

Route::get('/dolocitevNadomescanja', 'NadomescanjeController@index')->name('dolocitev_nadomescanja');
Route::post('/dolocitevNadomescanja', 'NadomescanjeController@nastaviNadomescanje');

Route::get('/email', 'RegistrationController@register')->name('register_post');
Route::get('/confirm-account/{token}', 'RegistrationController@confirm')->name('confirm-account');

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

// Registracija
Route::get('/register', 'RegistrationController@index')->name('register');
Route::post('/register', 'RegistrationController@register')->name('register_create_user');

// Poduporabnik
Route::get('/poduporabnik', 'PoduporabnikController@index')->name('poduporabnik');
Route::post('/poduporabnik', 'PoduporabnikController@create')->name('poduporabnik_create_user');


// Profil
Route::get('/profil', 'ProfilController@index')->name('profil');
Route::post('/profil', 'ProfilController@update')->name('profil_update');

// Kontaktna oseba
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@create')->name('contact_create_user');

// Prijava
Route::get('/prijava', 'PagesController@homePage')->name('prijava');
Route::post('/', 'UporabnikController@login')->name('login');

// Middleware skrbi, da mora biti uporabnik prijavljen
//Route::group(['middleware' => ['je.prijavljen']], function () {
	// Uporabnik
    Route::get('/newPassword', 'newPasswordController@index')->name('newPassword');
	Route::post('/newPassword', 'newPasswordController@change_password')->name('change_password');
	Route::get('/odjava', 'UporabnikController@logout')->name('odjava');

	Route::get('pozabljenoGeslo', 'UporabnikController@pozabljenoGeslo')->name('pozabljenoGeslo');
	Route::post('pozabljenoGeslo', 'UporabnikController@pozabljenoGesloPost');
	Route::get('/confirm-password/{token}', 'UporabnikController@confirm_password')->name('confirm-password');

	// Administrator
	Route::get('/admin', 'AdministratorController@index')->name('admin');
	Route::post('/admin', 'AdministratorController@create')->name('admin_create_user');

	// Plan
	Route::get('/datumplan', 'DatumPlanController@index')->name('datumPlan');
	Route::post('/datumplan', 'DatumPlanController@create')->name('create_datumPlan');
	Route::get('/plan', 'PlanController@index')->name('plan');
	Route::get('/plan/dodaj/{sifraPlan}/{sifraObiska}', 'PlanController@dodaj')->name('dodaj_plan');
	Route::get('/plan/odstrani/{sifraPlan}/{sifraObiska}', 'PlanController@odstrani')->name('odstrani_plan');
	Route::post('/plan/vnesiPodatke/{sifraObisk}/{sifraPlan}', 'PlanController@vnesiPodatke')->name('vnesiPodatke');

	// Nalog
	Route::get('/nalog', 'DelovniNalogController@index')->name('nalog');
	Route::post('/nalog', 'DelovniNalogController@create')->name('create_nalog');
	Route::get('/seznamNalogov', 'SeznamNalogovController@index')->name('seznamNalogov');
	Route::post('/seznamNalogov', 'SeznamNalogovController@filter')->name('filterSeznamNalogov');
	Route::get('/seznamObiskov', 'SeznamObiskovController@index')->name('seznamObiskov');
	Route::post('/seznamObiskov', 'SeznamObiskovController@filter')->name('filterSeznamObiskov');
	Route::get('/seznamObiskovPacient', 'SeznamObiskovPacientController@index')->name('seznamObiskovPacient');
	Route::get('/seznamObiskovVceraj', 'SeznamObiskovVcerajController@index')->name('seznamObiskovVceraj');
	Route::post('/seznamObiskovVceraj/vnesiPodatke/{sifraObisk}/{sifraPlan}', 'SeznamObiskovVcerajController@vnesiPodatke')->name('seznamObiskovVcerajVnesiPodatke');

  //Material
  Route::get('/material', 'MaterialController@index')->name('material');
  Route::post('/material', 'MaterialController@show')->name('show_material');
//});
