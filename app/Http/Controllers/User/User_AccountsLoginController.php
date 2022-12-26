<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User_AccountsLoginRequest;
use App\Models\User_Accounts;
use Illuminate\Http\Request;

class User_AccountsLoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User_AccountsLoginRequest $request)
    {
        $validator = $request->getValidator();
        $message;
        if($validator->fails())
        {
            $message = 1;
            $user_account = "error";
        }
        else
        {
            $name = $_POST["user_name"];
            $password = $_POST["password"];
            
            $user_account = User_Accounts::where('user_name', $name)->where('pass_hash', $password)->where('connection_status', 0)->first();
            if($user_account != null)
            {
                $user_account->update([
                    'last_login' => now(),
                    'connection_status' => true,
                ]);
                $message = 0;
            }
            else
            {
                $message = 2;
                $user_account = "error";
            }
        }

        $resultJson = json_encode(['result' => 0,'requestMessage' => $message, 'account_data' => $user_account]);
        return $resultJson;
    }
}
