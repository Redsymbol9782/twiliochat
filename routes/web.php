<?php

$this->get('/', 'Guest\HomeController@index')->name('guest.home');
Route::get('/sms', 'SmsController@sms');
Route::post('/sms', 'SmsController@sendSms');

Route::get('/voice', 'VoiceController@voice');
Route::post('/voice/call', function(){
    // Get form input
    $userPhone = Input::get('userPhone');
    $encodedSalesPhone = urlencode(str_replace(' ','',Input::get('salesPhone')));
    // Set URL for outbound call - this should be your public server URL
    $host = parse_url(Request::url(), PHP_URL_HOST);

    // Create authenticated REST client using account credentials in
    // <project root dir>/.env.php
    $client = new Twilio\Rest\Client(
        getenv('TWILIO_ACCOUNT_SID'),
        getenv('TWILIO_AUTH_TOKEN')
    );

    try {
        $client->calls->create(
            $userPhone, // The visitor's phone number
            getenv('TWILIO_NUMBER'), // A Twilio number in your account
            array(
                "url" => "http://$host/outbound/$encodedSalesPhone"
            )
        );
    } catch (Exception $e) {
        // Failed calls will throw
        return $e;
    }

    // return a JSON response
    return array('message' => 'Call incoming!');
});
Route::post('/outbound/{salesPhone}', function ($salesPhone) {
    // A message for Twilio's TTS engine to repeat
    $sayMessage = 'Thanks for contacting our sales department. Our
        next available representative will take your call.';

    $twiml = new Twilio\Twiml();
    $twiml->say($sayMessage, array('voice' => 'alice'));
    $twiml->dial($salesPhone);

    $response = Response::make($twiml, 200);
    $response->header('Content-Type', 'text/xml');
    return $response;
});
Route::get('/ivr', 'IvrController@ivr');

/** Authentication Routes **/
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

/** Change Password Routes **/
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

/** Password Reset Routes **/
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

/** Admin All Routes **/
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
	Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('events', 'Admin\EventsController');
    Route::post('events_mass_destroy', ['uses' => 'Admin\EventsController@massDestroy', 'as' => 'events.mass_destroy']);
    Route::resource('tickets', 'Admin\TicketsController');
    Route::post('tickets_mass_destroy', ['uses' => 'Admin\TicketsController@massDestroy', 'as' => 'tickets.mass_destroy']);
    Route::resource('payments', 'Admin\PaymentsController');
});

Route::group(
    ['prefix' => 'ivr', 'middleware' => 'checkforstar'], function () {
        Route::any(
            '/welcome', [
                'as' => 'welcome', 'uses' => 'IvrController@showWelcome'
            ]
        );
        Route::any(
            '/menu-response', [
                'as' => 'menu-response', 'uses' => 'IvrController@showMenuResponse'
            ]
        );
        Route::any(
            '/planet', [
                'as' => 'planet-connection',
                'uses' => 'IvrController@showPlanetConnection'
            ]
        );
    }
);

Route::get('/ivr', 'IvrController@ivr');