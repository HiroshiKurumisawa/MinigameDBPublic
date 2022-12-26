<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Http\Requests\Room\EntryRoomRequest;
use App\Models\Room_Settings;
use Illuminate\Http\Request;

class EntryRoomController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EntryRoomRequest $request)
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
            $roomEntryUser = $_POST["room_entry_user"];

            $EntryRoom = Room_Settings::where('room_name', $roomName)->where('room_password', $roomPassword)->where('in_room_users', '1')->first();
            if($EntryRoom != null)
            {
                $EntryRoom->update([
                    'in_room_users' => '2',
                    'user_entry' => $roomEntryUser,
                ]);
                $message = 0;
                $resultJson = json_encode(['result' => 0,'requestMessage' => $message, 'roomData' => $EntryRoom]);
                return $resultJson;
            }
            else
            {
                $message = 2;
                $resultJson = json_encode(['result' => 0,'requestMessage' => $message, 'roomData' => $EntryRoom]);
                return $resultJson;
            }
        }
    }
}
