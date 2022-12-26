<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Room_Settings;
use App\Models\Game_Datas;
use Illuminate\Http\Request;

class GameStartController extends Controller
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

        $gameDataAddision = new Game_datas();
        $gameDataAddision->create([
            'room_name' => $roomName,
            'set_point' =>'', 
            'game_state'=>'0',
        ]);

        $nowRoom = Room_Settings::where('room_name', $roomName)->first();

        $nowRoom->update([
            'game_status' => true,
        ]);
    }
}
