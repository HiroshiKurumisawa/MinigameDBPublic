<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game_Datas;
use Illuminate\Http\Request;

class UpdateGameController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $roomName = $_POST["room_name"];

        $nowGame = Game_Datas::where('room_name', $roomName)->first();
        $resultJson = json_encode(['result' => 0, 'gameData' => $nowGame]);
        return $resultJson;
    }
}
