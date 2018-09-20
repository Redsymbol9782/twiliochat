<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;

use Twilio\Rest\Client;

use Twilio\Jwt\ClientToken;

use Twilio\TwiML;

class ChatController extends Controller
{
    public function chat(){
        return view('chat.index');
    }
    public function generate(Request $request, AccessToken $accessToken, ChatGrant $ipmGrant)
    {
        $appName = "TwilioChat";
        $deviceId = $request->input("device");
        $identity = $request->input("identity");

        $TWILIO_IPM_SERVICE_SID = config('services.twilio')['ipmServiceSid'];

        $endpointId = $appName . ":" . $identity . ":" . $deviceId;

        $accessToken->setIdentity($identity);

        $ipmGrant->setServiceSid($TWILIO_IPM_SERVICE_SID);
        $ipmGrant->setEndpointId($endpointId);

        $accessToken->addGrant($ipmGrant);

        $response = array(
            'identity' => $identity,
            'token' => $accessToken->toJWT()
        );

        return response()->json($response);
    }
}
