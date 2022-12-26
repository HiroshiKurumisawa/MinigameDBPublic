<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Room_Settings;
use Illuminate\Http\Request;

class ReadyController extends Controller
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
        $readyUser = $_POST["ready_user"];

        $nowRoom = Room_Settings::where('room_name', $roomName)->first();
        $nowRoomHostUser = Room_Settings::where('room_name', $roomName)->value('user_host');
        $nowRoomEntryUser = Room_Settings::where('room_name', $roomName)->value('user_entry');
        $nowRoomHostUserRedyStatus = Room_Settings::where('room_name', $roomName)->value('ready_status_host');
        $nowRoomEntryUserRedyStatus = Room_Settings::where('room_name', $roomName)->value('ready_status_entry');

        if($readyUser == $nowRoomHostUser)
        {
            if($nowRoomHostUserRedyStatus == 0)
            {
                $nowRoom->update([
                    'ready_status_host' => true,
                ]);
            }
            else
            {
                $nowRoom->update([
                    'ready_status_host' => false,
                ]);
            }
        }
        else if($readyUser == $nowRoomEntryUser)
        {
            if($nowRoomEntryUserRedyStatus == 0)
            {
                $nowRoom->update([
                    'ready_status_entry' => true,
                ]);
            }
            else
            {
                $nowRoom->update([
                    'ready_status_entry' => false,
                ]);
            }
        }
    }
}
