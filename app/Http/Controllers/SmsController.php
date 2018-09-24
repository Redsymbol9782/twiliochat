<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

class SmsController extends Controller
{
	public function sms(){
		return view('sms.index');
	}
    public function sendSms(Request $request)
    {
        $accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $client = new Client($accountSid, $authToken);
		
		$post_data = $request->all();
		/* echo '<pre>';
		print_r($post_data);exit; */
        try{
            // Use the client to do fun stuff like send text messages!
            $client->messages->create(
				// the number you'd like to send the message to
                $post_data['to'],
				array(
					// A Twilio phone number you purchased at twilio.com/console
					'from' => '+17177143029',
					// the body of the text message you'd like to send
					'body' => $post_data['body']
				)
			);
			return redirect()->back()->with(['success'=>'Message send successfully!']);
		}catch (Exception $e){
            //echo "Error: " . $e->getMessage();
			return redirect()->back()->withErrors(['error'=>"Error: " . $e->getMessage()]);
        }
    }
}
