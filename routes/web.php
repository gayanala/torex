

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



Auth::routes();

Route::get('/about-us', function () { return view('Front-page');});

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('Securityquestions/check/{id}', 'SecurityquestionController@check')->name('check');
//
//Route::get('securityquestions/insertcheck/{id}', 'SecurityquestionController@insertcheck')->name('insertcheck');

Route::resource('securityquestions', 'UserSecurityQuestionController');

Route::resource('attachment', 'DonationRequestController');

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

//Route::get('/emailtemplates/edit/{id}','EmailTemplateController@edit')->name('emailtemplate');

//Route::post('/emailtemplate', 'EmailTemplateController@edit');

Route::get('/emailtemplates/edit/{id}', 'EmailTemplateController@edit');

Route::resource('emailtemplates', 'EmailTemplateController');

//Emails

Route::get('/email', 'EmailController@email') ->name('sendWelcomeEmail');

//Dashboard

Route::get('/dashboard', 'DashboardController@index');

// Rules stuff
Route::get('guirules', 'RuleEngineController@rulesGui');
Route::get('runRule', 'RuleEngineController@runRule');
Route::get('rules', 'RuleEngineController@rules');
// Rules stuff// Rules stuff
//Route::get('rules', 'RuleEngineController@rulesGUI');
Route::get('/webhook/chargeSuccess', 'SubscriptionController@chargeSuccess');

Route::get('subscription/popup', 'SubscriptionController@subscribe');
