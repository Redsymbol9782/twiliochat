<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;

/**
 * Class User
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $location
 * @property string $agent_type
 * @property string $support
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['first_name', 'last_name', 'name', 'area_code', 'phone', 'email', 'password', 'location', 'remember_token', 'role_id', 'agent_type_id', 'support_id'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input){
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input){
        $this->attributes['role_id'] = $input ? $input : null;
    }
    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    public function setAgentTypeIdAttribute($input){
        $this->attributes['agent_type_id'] = $input ? $input : null;
    }
    public function agentType(){
        return $this->belongsTo(AgentType::class, 'agent_type_id');
    }
	
	public function setSupportIdAttribute($input){
        $this->attributes['support_id'] = $input ? $input : null;
    }
    public function support(){
        return $this->belongsTo(Support::class, 'support_id');
    }
    
}
