<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Room_Settings;
use Illuminate\Http\Request;

class RoomKeepUpdateController extends Controller
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
        $message = 0;
        $resultJson = json_encode(['result' => 0, 'roomData' => $nowRoom]);
        return $resultJson;
    }
}
