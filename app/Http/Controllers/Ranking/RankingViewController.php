<?php

namespace App\Http\Controllers\Ranking;

use App\Http\Controllers\Controller;
use App\Models\User_Accounts;
use Illuminate\Http\Request;

class RankingViewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $acountDatas = User_Accounts::get();

        $resultJson = json_encode(['result' => 0,'allAcountList' => $acountDatas]);
        return $resultJson;
    }
}
