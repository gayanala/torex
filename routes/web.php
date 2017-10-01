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

Route::get('Securityquestions/check/{id}', 'SecurityquestionController@check')->name('check');

Route::get('securityquestions/insertcheck/{id}', 'SecurityquestionController@insertcheck')->name('insertcheck');

Route::resource('securityquestions', 'SecurityquestionController');

Route::resource('/users', 'UserController');

Route::post('user/register', 'UserController@create');

Route::get('/organization', 'OrganizationController@index');

Route::post('/organization', 'OrganizationController@create');

Route::post('/donate', 'DonationRequestController@store')->name('donation');

Route::resource('/donationrequests', 'DonationRequestController');

Route::get('/donationrequests/create', 'DonationRequestController@create')->name('donation');

Route::get('change-password', function() {
    return view('change-password');
})->name('reset-password');

Route::post('change-password', 'Auth\UpdatePasswordController@update');