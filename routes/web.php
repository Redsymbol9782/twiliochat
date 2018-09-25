<?php
use Illuminate\Support\Facades\Input;

$this->get('/', 'Guest\HomeController@index')->name('guest.home');

Route::get('/sms', 'SmsController@sms');
Route::post('/sms', 'SmsController@sendSms');

Route::get('/chat', 'ChatController@chat');
Route::post('/chat/token', 'TokenController@generate');

Route::get('/videochat', "VideoRoomsController@index");

Route::group(['prefix' => 'room'], function () {
	Route::post('/create', 'VideoRoomsController@createRoom');
	Route::get('/join/{roomName}', 'VideoRoomsController@joinRoom');
});

Route::get('/verify_caller_id', ['uses' => 'AuthyController@show_status','middleware' => 'auth']);
Route::get('/user_verify', ['uses' => 'AuthyController@verifyUser','middleware' => 'auth']);
Route::post('/user_verify', ['uses' => 'AuthyController@verify','middleware' => 'auth']);
Route::post('/user_verify_resend', ['uses' => 'AuthyController@verifyResend','middleware' => 'auth']);

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
    $sayMessage = 'Thanks for contacting our sales department. Our next available representative will take your call.';

    $twiml = new Twilio\Twiml();
    $twiml->say($sayMessage, array('voice' => 'alice'));
    $twiml->dial($salesPhone);
    
    $response = Response::make($twiml, 200);
    $response->header('Content-Type', 'text/xml');
    return $response;
});

Route::group(['middleware' => ['checkforstar'], 'prefix' => 'ivr', 'as' => 'ivr.'], function () {
	Route::get('/', 'IvrController@ivr');
	Route::post('/welcome', 'IvrController@showWelcome');
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
Route::group(['middleware' => ['auth']], function (){
	Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
	Route::resource('permissions', 'PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('events', 'EventsController');
    Route::post('events_mass_destroy', ['uses' => 'EventsController@massDestroy', 'as' => 'events.mass_destroy']);
    Route::resource('tickets', 'TicketsController');
    Route::post('tickets_mass_destroy', ['uses' => 'TicketsController@massDestroy', 'as' => 'tickets.mass_destroy']);
	Route::resource('calllogs', 'CalllogsController');
	Route::get('calllog_refresh', 'CalllogsController@calllog_refresh');
    Route::resource('payments', 'PaymentsController');
});

/** for phpmyadmin **/
Route::get('/adminer',function(){
	return redirect('public/adminer.php');
});