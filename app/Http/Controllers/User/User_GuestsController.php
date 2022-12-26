<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User_GuestsRequest;
use App\Models\User_Guests;
use Illuminate\Http\Request;

class User_GuestsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(User_GuestsRequest $request)
    {
        $user_guest = User_Guests::where('connection_status', 0)->first();
        if($user_guest!=null) 
        {
            $user_guest->update([
                'last_login' => now(),
                'connection_status' => true,
            ]);
        }
        else
        {
            $guest_addition = new User_Guests();
            $guest_additionNum = User_Guests::count('manage_id');
            $guest_additionNum++;
            $guest_addition->create([
                'login_id' => $guest_additionNum,
                'user_name'=> "ゲスト".$guest_additionNum,
                'last_login' => now(),
                'connection_status' => false,
            ]);
            $user_guest = User_Guests::where('connection_status', 0)->first();
            $user_guest->update([
                'last_login' => now(),
                'connection_status' => true,
            ]);
        }
        $resultJson = json_encode(['result' => 0,'guest_data' => $user_guest]);
        return $resultJson;
    }
}
