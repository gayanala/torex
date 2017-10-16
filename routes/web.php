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
if(env('REDIRECT_HTTPS'))
{
    URL::forceScheme('https');
};

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\Storage;

Auth::routes();

Route::get('/about-us', function () { return view('Front-page');});

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('Securityquestions/check/{id}', 'SecurityquestionController@check')->name('check');
//
//Route::get('securityquestions/insertcheck/{id}', 'SecurityquestionController@insertcheck')->name('insertcheck');

Route::resource('securityquestions', 'UserSecurityQuestionController');

Route::resource('attachment', 'DonationRequestController');

// Route::get('attachment', 'DonationRequestController@attachment');
// Route::post('attachment', 'DonationRequestController@attachmentPost');

Route::resource('/users', 'UserController');

Route::resource('organizations', 'OrganizationController');
Route::group(['prefix' => 'subscription'], function () {
    Route::get('/', [
        'as' => 'subscription',
        'uses' => 'SubscriptionController@getIndex'
    ]);
    Route::post('/', [

        'uses' => 'SubscriptionController@postJoin'
    ]);
});

Route::post('user/register', 'UserController@create');

Route::get('/organization', 'OrganizationController@index');

Route::post('/organization', 'OrganizationController@create');

// Route::post('/donate', 'DonationRequestController@store')->name('donation');

Route::get('/donationrequests/create', 'DonationRequestController@create')->name('donation');

Route::get('donationrequests/search','DonationRequestController@searchDonationRequest');

Route::resource('/donationrequests', 'DonationRequestController');

Route::get('change-password', function() {
    return view('change-password');
})->name('reset-password');

Route::post('change-password', 'Auth\UpdatePasswordController@update');

// s3 Route
//
// get('donationrequests', function () {
//
//   $s3 = Storage::disk('s3');
//   $s3->put('attachment','hello!', 'public');
//
// }
//

//Route::get('/emailtemplates/edit/{id}','EmailTemplateController@edit')->name('emailtemplate');

//Route::post('/emailtemplate', 'EmailTemplateController@edit');

Route::get('/emailtemplates/edit/{id}', 'EmailTemplateController@edit');

Route::resource('emailtemplates', 'EmailTemplateController');

//Emails

Route::get('/email', 'EmailController@email') ->name('sendWelcomeEmail');

//Dashboard

Route::get('/dashboard', 'DashboardController@index');

// Rules stuff// Rules stuff
Route::get('denialrules', 'RuleEngineController@rulesDenial');
Route::get('acceptancerules', 'RuleEngineController@rulesAcceptance');
Route::get('pendingrules', 'RuleEngineController@rulesPending');
Route::get('pendingrules', 'RuleEngineController@rulesAutodenial');
Route::get('rules', 'RuleEngineController@rulesGUI');



Route::get('/webhook/chargeSuccess', 'SubscriptionController@chargeSuccess');

Route::get('subscription/popup', 'SubscriptionController@subscribe');
