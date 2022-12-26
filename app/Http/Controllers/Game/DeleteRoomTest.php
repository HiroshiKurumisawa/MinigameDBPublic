<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Room_Settings;
use App\Models\Game_Datas;
use Illuminate\Http\Request;

class DeleteRoomTest extends Controller
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

        $nowRoom = Room_Settings::where('room_name', $roomName)->first();
        if($nowRoom!=null)
        {
            $nowRoom->delete();
        }
        $nowGameData = Game_Datas::where('room_name', $roomName)->first();
        if($nowGameData!=null)
        {
            $nowGameData->delete();
        }
    }
}
