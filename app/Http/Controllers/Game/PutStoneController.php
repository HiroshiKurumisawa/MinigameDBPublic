<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game_Datas;
use Illuminate\Http\Request;

class PutStoneController extends Controller
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
        $putPoint = $_POST["put_point"];
        $gameState = $_POST["game_status"];

        $nowGame = Game_Datas::where('room_name', $roomName)->first();

        $nowGame->update([
            'set_point' => $putPoint,
            'game_state' => $gameState,
        ]);
    }
}
