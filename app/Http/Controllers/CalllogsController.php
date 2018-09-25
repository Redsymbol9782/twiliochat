<?php

namespace App\Http\Controllers;

use App\Calllog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;


/* use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken; */

class CalllogsController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Gate::allows('calllog_access')){
            return abort(401);
        }
		
		$calllogs = Calllog::get();
		$title = "Calllog";
        return view('calllogs.index', compact('calllogs','title'));
    }
	
    public function calllog_refresh(){
		if(! Gate::allows('calllog_access')){
            return abort(401);
        }
		$accountSid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
        $authToken  = config('app.twilio')['TWILIO_AUTH_TOKEN'];
        $appSid     = config('app.twilio')['TWILIO_APP_SID'];
        $twilio = new Client($accountSid, $authToken);
		
		$calls = $twilio->calls->read();
		$calllog = array();
		foreach($calls as $k => $record){
			$existEntry = Calllog::where('sid','=',$record->sid)->first();
			if(count($existEntry['sid'])== 0 && !empty($record->to)){
				$calllog[$k]['sid'] = $record->sid;
				$dateCreated = $record->dateCreated;
				$calllog[$k]['dateCreated'] = $dateCreated->format('Y-m-d H:i:s');
				$dateUpdated = $record->dateUpdated;
				$calllog[$k]['dateUpdated'] = $dateUpdated->format('Y-m-d H:i:s');
				$calllog[$k]['parentCallSid'] = $record->parentCallSid;
				$calllog[$k]['accountSid'] = $record->accountSid;
				$calllog[$k]['to'] = $record->to;
				$calllog[$k]['from'] = $record->from;
				$calllog[$k]['phoneNumberSid'] = $record->phoneNumberSid;
				$calllog[$k]['status'] = $record->status;
				$calllog[$k]['startTime'] = $record->startTime->format('Y-m-d H:i:s');
				$calllog[$k]['endTime'] = $record->endTime->format('Y-m-d H:i:s');
				$calllog[$k]['duration'] = $record->duration;
				$calllog[$k]['price'] = $record->price;
				$calllog[$k]['priceUnit'] = $record->priceUnit;
				$calllog[$k]['direction'] = $record->direction;
				$calllog[$k]['answeredBy'] = $record->answeredBy;
				$calllog[$k]['annotation'] = $record->annotation;
				$calllog[$k]['apiVersion'] = $record->apiVersion;
				$calllog[$k]['forwardedFrom'] = $record->forwardedFrom;
				$calllog[$k]['groupSid'] = $record->groupSid;
				$calllog[$k]['callerName'] = $record->callerName;
				$calllog[$k]['uri'] = $record->uri;
				$calllog[$k]['notifications'] = $record->subresourceUris['notifications'];
				$calllog[$k]['recordings'] = $record->subresourceUris['recordings'];
			}else{
				unset($calllog[$k]);
			}
		}
		Calllog::insert($calllog);
		$calllogs = Calllog::get();
		$title = "Calllog";
        return view('calllogs.index', compact('calllogs','title'));
	}
    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(! Gate::allows('calllog_view')){
            return abort(401);
        }
        $calllog = Calllog::findOrFail($id);
		$title = "Calllog";
        return view('calllogs.show', compact('calllog','title'));
    }

}
