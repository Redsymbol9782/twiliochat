<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ticket
 *
 * @package App
 * @property string $event
 * @property string $title
 * @property integer $amount
 * @property string $available_from
 * @property string $available_to
 * @property double $price
*/
class Calllog extends Model
{
    use SoftDeletes;

    protected $fillable = ['sid', 'dateCreated', 'dateUpdated', 'parentCallSid', 'accountSid', 'to','from', 'phoneNumberSid', 'status', 'startTime', 'endTime', 'duration', 'price', 'priceUnit', 'direction', 'answeredBy', 'annotation', 'apiVersion', 'forwardedFrom', 'groupSid', 'callerName', 'uri', 'notifications', 'recordings'];
    
   
    
}
