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

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('index',function(){
// 	return view('index');
// });


Route::get('/index', 'StudentsController@index')->name('index');
Route::get('create', 'StudentsController@create')->name('student.create');
Route::post('store','StudentsController@store')->name('student.store');
Route::get('edit/{id}','StudentsController@edit')->name('student.edit');
Route::post('update/{id}','StudentsController@update')->name('student.update');
Route::get('show/{id?}', 'StudentsController@show')->name('student.show');
Route::post('delete/{id}','StudentsController@destroy')->name('student.destroy');
//Route::get('/', function () {
//})->middleware(['auth', 'password.confirm']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
