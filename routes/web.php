<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/','inicio');



//Creados por El Desarrollador
Route::get('inicio','Web\pageController@inicio')->name('inicio');
//cambio de informacion del usuario
Route::get('/cambiar-contrasena/',function () {
    return view('session.mypassword');
})->middleware(['auth'])->name('mypassword');
Route::get('/cambiar-datos/',function () {
    return view('session.myinfo');
})->middleware(['auth'])->name('myinfo');
Route::post('/dashboard','Web\pageController@savemyinfo')->name('savemyinfo');


//rutas de las clases
Route::resource('users','UserController');
Route::resource('options','OptionController');
Route::resource('profiles','ProfileController');

//nativo de la aplicacion luego de activar el modulo auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

