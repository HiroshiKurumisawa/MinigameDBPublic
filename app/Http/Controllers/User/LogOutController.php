<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LogOutRequest;
use App\Models\User_Guests;
use App\Models\User_Accounts;
use Illuminate\Http\Request;

class LogOutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(LogOutRequest $request)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // UnityからPOSTされたデータを受け取る
            $id = $_POST["manageID"];
            $name = $_POST["userName"];
            $userType = $_POST["userType"];

            if($userType == "0")
            {
                $user_guest = User_Accounts::where('manage_id', $id)->where('user_name', $name)->first();
                $user_guest->update([
                    'connection_status' => false,
                ]);
            }
            else if($userType == "1")
            {
                $user_guest = User_Guests::where('manage_id', $id)->where('user_name', $name)->first();
                $user_guest->update([
                    'connection_status' => false,
                ]);
            }
        }
    }
}
