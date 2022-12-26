<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Room_Settings;
use Illuminate\Http\Request;

class RoomLeaveController extends Controller
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
        $roomLeaveUser = $_POST["room_leave_user"];
        
        $nowRoom = Room_Settings::where('room_name', $roomName)->first();
        $nowRoomInRoomNum = Room_Settings::where('room_name', $roomName)->value('in_room_users');
        $nowRoomHostUser = Room_Settings::where('room_name', $roomName)->value('user_host');
        $nowRoomEntryUser = Room_Settings::where('room_name', $roomName)->value('user_entry');

        if($roomLeaveUser == $nowRoomHostUser)
        {
            if($nowRoomInRoomNum == "2")
            {
                $nowRoom->update([
                    'in_room_users' => '1',
                    'user_host' => $nowRoomEntryUser,
                    'user_entry' => '',
                    'ready_status_host' => false,
                    'ready_status_entry' => false,
                ]);
            }
            else if ($nowRoomInRoomNum == "1")
            {
                $nowRoom->update([
                    'in_room_users' => '0',
                    'user_host' => '',
                    'user_entry' => '',
                    'ready_status_host' => false,
                    'ready_status_entry' => false,
                ]);
            }
        }
        else if($roomLeaveUser == $nowRoomEntryUser)
        {
            if($nowRoomInRoomNum == "2")
            {
                $nowRoom->update([
                    'in_room_users' => '1',
                    'user_entry' => '',
                    'ready_status_host' => false,
                    'ready_status_entry' => false,
                ]);
            }
        }

        $nowRoomInRoomNum = Room_Settings::where('room_name', $roomName)->value('in_room_users');
        if($nowRoomInRoomNum == "0")
        {
            $nowRoom->delete();
        }
        $resultJson = json_encode(['result' => 0]);
        return $resultJson;
    }
}
