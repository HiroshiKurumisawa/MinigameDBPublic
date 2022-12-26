<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\Room_Settings;
use Illuminate\Http\Request;

class UpdateSelectRoomsFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $roomDatas = Room_Settings::get();

        $resultJson = json_encode(['result' => 0,'allRoomList' => $roomDatas]);
        return $resultJson;
    }
}
