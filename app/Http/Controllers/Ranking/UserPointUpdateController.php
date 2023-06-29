<?php

namespace App\Http\Controllers\Ranking;

use App\Http\Controllers\Controller;
use App\Models\User_Accounts;
use Illuminate\Http\Request;

class UserPointUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $name = $_POST["user_name"];
        $point = $_POST["user_point"];
        $user_account = User_Accounts::where('user_name', $name)->first();
        if($user_account != null)
        {
            $user_account->update([
                'point' => $point,
            ]);
        }
    }
}
