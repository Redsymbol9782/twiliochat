<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Employee;
use App\Role;
use Validator;
use Eloquent;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Auth\Authenticatable;
use Mail;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }
    
    public function showRegistrationForm()
    {
        $roleCount = Role::count();
		if($roleCount != 0) {
			$userCount = User::count();
			//if($userCount == 0) {
			return view('auth.register');
			/* } else {
				return redirect('user/login');
			} */
		} else {
			return view('errors.error', [
				'title' => 'Migration not completed',
				'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
			]);
		}
    }
    
    public function showLoginForm()
    {
		echo 'asdf';exit;
		/* $roleCount = Role::count();
		if($roleCount != 0) {
			$userCount = User::count();
			if($userCount == 0) {
				return redirect('register');
			} else {
				return view('auth.login');
			}
		} else {
			return view('errors.error', [
				'title' => 'Migration not completed',
				'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
			]);
		} */
		$view = property_exists($this, 'loginView') ? $this->loginView : 'auth.authenticate';
		if (view()->exists($view)) {
			return view($view);
		}
		return view('auth.login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // TODO: This is Not Standard. Need to find alternative
        Eloquent::unguard();
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'context_id' => 0,
            'type' => "User",
			'verify' => 0,
        ]);
    }
}
