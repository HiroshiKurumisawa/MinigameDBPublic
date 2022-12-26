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
        $name = $_POST["user_name"];
        $password = $_POST["password"];
        $user_accountName=User_Accounts::where('user_name', $name)->first();
        $user_accountPass=User_Accounts::where('user_name', $name)->value('pass_hash');
        $message;
        if($validator->fails())
        {
            if(($user_accountName!=null)&&($user_accountPass!=$password)){$message = 2;}
            else if(($user_accountName==null)&&($user_accountPass!=$password)){$message = 4;}
            else{$message = 1;}
            $user_account = "error";
        }
        else
        {           
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
                if(($user_accountName!=null)&&($user_accountPass!=$password)){$message = 2;}
                else if(($user_accountName==null)&&($user_accountPass!=$password)){$message = 4;}
                else{$message = 3;}
                $user_account = "error";
            }
        }

        $resultJson = json_encode(['result' => 0,'requestMessage' => $message, 'account_data' => $user_account]);
        return $resultJson;
    }
}
