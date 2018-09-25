<?php 
   
   namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;
use Twilio\TwiML;
use Auth;
 use Twilio\Jwt\AccessToken;
  use Twilio\Jwt\Grants\VideoGrant;

class VideoRoomsController extends Controller
{
	
	protected $sid;
	protected $token;
	protected $key;
	protected $secret;

	public function __construct()
	{
		$this->middleware('auth');
	   /* $this->sid = config('services.twilio.sid');
	   $this->token = config('services.twilio.token');
	   $this->key = config('services.twilio.key');
	   $this->secret = config('services.twilio.secret'); */
	   
		$this->accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $this->authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $this->appSid     = config('app.twilio')['TWILIO_APP_SID'];
		$this->apikey = config('app.twilio')['AUTHY_API_KEY'];
		$this->apisecret = config('app.twilio')['TWILIO_API_SECRET'];
		
	}
	
	public function index()
	{
	   $rooms = [];
	   try {
		   $client = new Client($this->accountSid, $this->authToken);
		   $allRooms = $client->video->rooms->read([]);

			$rooms = array_map(function($room) {
			   return $room->uniqueName;
			}, $allRooms);

	   } catch (Exception $e) {
		   echo "Error: " . $e->getMessage();
	   }
	   
	   return view('index', ['rooms' => $rooms]);
	}

	public function createRoom(Request $request)
	{
		$client = new Client($this->accountSid, $this->authToken);

	   $exists = $client->video->rooms->read([ 'uniqueName' => $request->get('roomName')]);
	   if (empty($exists)) {
		   $client->video->rooms->create([
			   'uniqueName' => $request->roomName,
			   'type' => 'group',
			   'recordParticipantsOnConnect' => false
		   ]);

		   \Log::debug("created new room: ".$request->roomName);
	   }

	   return redirect('/room/join/'.urlencode($request->get('roomName')));
	}

	public function joinRoom($roomName)
	{
		// A unique identifier for this user
		$identity = Auth::user()->name;
		$roomName = urldecode($roomName);
		//Log::debug("joined with identity: $identity");
		$token = new AccessToken($this->accountSid, $this->apikey, $this->apisecret, 3600, $identity);
		$accessToken = $token->toJWT();
		$videoGrant = new VideoGrant();
		$videoGrant->setRoom($roomName);

		$token->addGrant($videoGrant);
		return view('tickets/room',compact('accessToken','roomName'));
	}
	
}
