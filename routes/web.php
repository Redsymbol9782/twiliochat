<?php
use Illuminate\Support\Facades\Input;

$this->get('/', 'Guest\HomeController@index')->name('guest.home');

Route::get('/sms', 'SmsController@sms');
Route::post('/sms', 'SmsController@sendSms');

Route::get('/chat', 'ChatController@chat');
Route::post('/chat/token', 'ChatController@generate');

Route::get('/verify_caller_id', ['uses' => 'UserController@show_status','middleware' => 'auth']);
Route::get('/user_verify', ['uses' => 'UserController@verifyUser','middleware' => 'auth']);
Route::post('/user_verify', ['uses' => 'UserController@verify','middleware' => 'auth']);
Route::post('/user_verify_resend', ['uses' => 'UserController@verifyResend','middleware' => 'auth']);

Route::get('/voice', 'VoiceController@voice');

Route::post('/voice/call', function () {
    // Get form input
    $userPhone = Input::get('userPhone');
    $encodedSalesPhone = urlencode(str_replace(' ','',Input::get('salesPhone')));
    
    $client = new Twilio\Rest\Client(
        config('app.twilio')['TWILIO_ACCOUNT_SID'],
        config('app.twilio')['TWILIO_AUTH_TOKEN']
    );
    $url = config('app.url');
    
	$client->calls
        ->create($userPhone, // to
            Input::get('salesPhone'), // from
            array(
			    "method" => "GET",
			    "statusCallback" => $url."/public/twilio_log.php",
			    "statusCallbackEvent" => array("initiated","answered"),
			    "statusCallbackMethod" => "POST",
			    "url" => $url."/outbound/".$encodedSalesPhone
		    )
        );
    // return a JSON response
    return array('message' => 'Call incoming!');
}); 

// POST URL to handle form submission and make outbound call
Route::get('/outbound/{salesPhone}', function ($salesPhone) {
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

Route::group(['middleware' => ['checkforstar'], 'prefix' => 'ivr', 'as' => 'ivr.'], function () {
	Route::get('/', 'IvrController@ivr');
	Route::get('/welcome', 'IvrController@showWelcome');
	Route::post('/menu_response', 'IvrController@showMenuResponse');
	Route::post('/planet', 'IvrController@showPlanetConnection');
});


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