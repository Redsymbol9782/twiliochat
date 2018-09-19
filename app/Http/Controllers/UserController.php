<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth,DB;
use Authy\AuthyApi as AuthyApi;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Twilio\Rest\Client;

//require 'vendor/authy/php/lib/Authy/AuthyApi.php';
//require_once 'vendor/authy/php/lib/Authy/AuthyApi.php';
class UserController extends Controller
{
	public function show_status(){
		$user = Auth::user();
		return view('user.index',compact('user'));
	}
    public function verifyUser(){
		$user = Auth::user();
		
		require_once('vendor/authy/php/lib/Authy/AuthyApi.php');
		
		$authyApi = new AuthyApi('FjJo1eR7n0UYDkLVxIS455FcI36Q5nRr');
		$authyUser = $authyApi->registerUser(
            $user['email'],
            $user['phone'],
            $user['area_code']
        );
        if($authyUser->ok()){
            $updateAuthy = array(
				'authy_id' => $authyUser->id()
			);
			DB::table('users')->where('id',$user['id'])->update($updateAuthy);
            
            $sms = $authyApi->requestSms($authyUser->id());
            return view('user.verifyUser');
        }else{
			$errors = $this->getAuthyErrors($authyUser->errors());
			echo '<pre>';
			print_r($errors);exit;
			return redirect('verify_caller_id')->withErrors(['error'=> new MessageBag($errors)]);
		}
	}
	public function verify(Request $request, AuthyApi $authyApi, Client $client){
        $token = $request->input('token');
        $verification = $authyApi->verifyToken($user->authy_id, $token);

        if($verification->ok()){
            $user->verified = true;
            $user->save();
            $this->sendSmsNotification($client, $user);
            return redirect('verify_caller_id');
        }else{
            $errors = $this->getAuthyErrors($verification->errors());
			return redirect('user_verify')->withErrors(['error'=> new MessageBag($errors)]);
		}
    }
    public function verifyResend(Request $request, AuthyApi $authyApi){
        $sms = $authyApi->requestSms($user->authy_id);
        if ($sms->ok()){
            $request->session()->flash(
                'status',
                'Verification code re-sent'
            );
            return redirect('user_verify');
        } else {
            $errors = $this->getAuthyErrors($sms->errors());
            return redirect('user_verify')->withErrors(['error'=> new MessageBag($errors)]);
        }
    }
    private function getAuthyErrors($authyErrors){
        $errors = [];
        foreach($authyErrors as $field => $message){
            array_push($errors, $field . ': ' . $message);
        }
        return $errors;
    }
    private function sendSmsNotification($client, $user){
        $twilioNumber = config('app.twilio')['TWILIO_NUMBER'] or die(
            "TWILIO_NUMBER is not set in the environment"
        );
        $messageBody = 'You did it! Verification complete :)';
        $client->messages->create(
            $user->fullNumber(),    // Phone number which receives the message
            [
                "from" => $twilioNumber, // From a Twilio number in your account
                "body" => $messageBody
            ]
        );
    }
}
