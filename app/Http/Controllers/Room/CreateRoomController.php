<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\CreateRoomRequest;
use App\Models\Room_Settings;
use Illuminate\Http\Request;

class CreateRoomController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRoomRequest $request)
    {
        $validator = $request->getValidator();
        $message;

        if($validator->fails())
        {
            $message = 1;
            $resultJson = json_encode(['result' => 0,'requestMessage' => $message]);
            return $resultJson;
        }
        else
        {
            $roomName = $_POST["room_name"];
            $roomPassword = $_POST["room_password"];
            $roomMaxUsers = $_POST["room_max_users"];
            $roomHostUser = $_POST["room_host_user"];

            $room_addition = new Room_Settings();
            $room_addition->create([
                'room_name' => $roomName,
                'room_password' => $roomPassword,
                'max_room_users' => $roomMaxUsers,
                'in_room_users' => '1',
                'user_host' => $roomHostUser,
                'user_entry' => '',
                'ready_status_host' => false,
                'ready_status_entry'=> false,
                'game_status' => false,
            ]);
            $nowDoneRoom = Room_Settings::where('room_name', $roomName)->first();
            $message = 0;
            $resultJson = json_encode(['result' => 0,'requestMessage' => $message, 'roomData' => $nowDoneRoom]);
            return $resultJson;
        }
    }
}
