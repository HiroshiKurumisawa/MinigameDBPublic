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
            $account_Search = User_Accounts::where('user_name', $_POST["user_name"])->value('user_name');
            $user_NameError = strpos($_POST["user_name"],'ゲスト');
            $user_errorCode;
            $userError = false;
            $passwordError = false;
            if(($_POST["user_name"]==null||$_POST["user_name"]==$account_Search||$user_NameError===0)) // ユーザー名エラー
            {
                if($_POST["user_name"]==null)
                {
                    $user_errorCode = 0;          
                }
                else if($_POST["user_name"]==$account_Search)
                {
                    $user_errorCode = 1;
                    
                }
                else if ($user_NameError===0)
                {
                    $user_errorCode = 2;
                }
                $userError=true;
            }

            if ($_POST["password"]!=$_POST["repassword"]||($_POST["password"]==null||$_POST["password"]==null)) // パスワードエラー
            {
                $passwordError= true;
            }
            
            if($userError&&!$passwordError)
            {
                switch($user_errorCode)
                {
                    case 0:
                        $message=1;
                    break;
                    case 1:
                        $message=2;
                    break;
                    case 2:
                        $message=3;
                    break;
                }
            }
            else if (!$userError&&$passwordError)
            {
                $message=4;
            }
            else
            {
                $message=5;
            }
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
