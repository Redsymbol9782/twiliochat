<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

class VoiceController extends Controller
{
	public function voice(){
		return view('voice.index');
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
            $client->calls->create(
				// the number you'd like to send the message to
                $post_data['to'],
				array(
					// A Twilio phone number you purchased at twilio.com/console
					'url' => "http://$host/outbound/$encodedSalesPhone"
				)
			);
			return redirect()->back()->with(['success'=>'Message send successfully!']);
		}catch (Exception $e){
            //echo "Error: " . $e->getMessage();
			return redirect()->back()->withErrors(['error'=>"Error: " . $e->getMessage()]);
        }
    }
}
