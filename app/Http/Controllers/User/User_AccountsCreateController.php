<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\User_AccountsCreateRequest;
use App\Models\User_Accounts;
use Illuminate\Http\Request;

class User_AccountsCreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User_AccountsCreateRequest $request)
    {
        $validator = $request->getValidator();
        $message;

        if($validator->fails())
        {
            $message = 1;
        }
        else
        {
            $name = $_POST["user_name"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
    
            $accont_addition = new User_Accounts();
            $accont_additionNum = User_Accounts::count('manage_id');
            $accont_additionNum++;
            $accont_addition->create([
                'login_id' => $accont_additionNum,
                'user_name'=> $name,
                'pass_hash' => $password,
                'last_login' => now(),
                'connection_status' => false,
            ]);
            $message = 0;
        }

        $resultJson = json_encode(['result' => 0,'requestMessage' => $message]);
        return $resultJson;
    }
}
