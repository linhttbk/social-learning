<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class UserActivation extends Model
{
	protected $table = 'user_activations';

    protected function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    public function createActivation($user)
    {

        $activation = $this->getActivation($user);

        if (!$activation) {
            return $this->createToken($user);
        }
        return $this->regenerateToken($user);

    }

    private function regenerateToken($user)
    {

        $token = $this->getToken();
        UserActivation::where('uid', $user->uid)->update([
            'remember_token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    private function createToken($user)
    {
        $token = $this->getToken();
        UserActivation::insert([
            'uid' => $user->uid,
            'activation_code'=>"",
            'remember_token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    public function getActivation($user)
    {
        return UserActivation::where('uid', $user->uid)->first();
    }


    public function getActivationByToken($token)
    {
        return UserActivation::where('remember_token', $token)->first();
    }

    public function deleteActivation($token)
    {
        UserActivation::where('remember_token', $token)->delete();
    }
}