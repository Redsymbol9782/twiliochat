<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth,DB;
use Authy\AuthyApi as AuthyApi;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Twilio\Rest\Client;


include('vendor/authy/php/lib/Authy/AuthyApi.php');
class UserController extends Controller
{
	public function show_status(){
		$user = Auth::user();
		return view('user.index',compact('user'));
	}
    public function verifyUser(){
		$user = Auth::user();
		
		$authyApi = new AuthyApi(config('app.twilio')['AUTHY_API_KEY']);
		
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
			return redirect('verify_caller_id')->withErrors(['error'=> new MessageBag($errors)]);
		}
	}
	public function verify(Request $request, AuthyApi $authyApi, Client $client){
        $token = $request->input('token');
		$user = Auth::user();
		$verification = $authyApi->verifyToken($user['authy_id'], $token);
		
		if($verification->ok()){
			$updateArr = array(
				'verified' => 1
			);
			DB::table('users')->where('id',$user['id'])->update($updateArr);
            $this->sendSmsNotification($client, $user);
			$request->session()->flash(
                'status',
                'Verification complete!'
            );
            return redirect('verify_caller_id'); 
        }else{
            $errors = $this->getAuthyErrors($verification->errors());
			return redirect('user_verify')->withErrors(['error'=> $errors]);
		}
    }
    public function verifyResend(Request $request, AuthyApi $authyApi){
		$user = Auth::user();
        $sms = $authyApi->requestSms($user['authy_id']);
        if ($sms->ok()){
            $request->session()->flash(
                'status',
                'Verification code re-sent'
            );
            return redirect('user_verify');
        } else {
            $errors = $this->getAuthyErrors($sms->errors());
            return redirect('user_verify')->withErrors(['error'=> $errors]);
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
		$fullNumber = $user['area_code'].$user['phone'];
        $client->messages->create(
            $fullNumber,    // Phone number which receives the message
            [
                "from" => $twilioNumber, // From a Twilio number in your account
                "body" => $messageBody
            ]
        );
    }
}
