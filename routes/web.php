<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\Room;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//テスト用
Route::get('/user', \App\Http\Controllers\User\IndexController::class)
->name('user.index');
Route::get('/room', \App\Http\Controllers\Room\IndexController::class)
->name('room.index');
//

Route::post('/user/account/create', \App\Http\Controllers\User\User_AccountsCreateController::class)
->name('user_account.create');

Route::post('/user/account/login', \App\Http\Controllers\User\User_AccountsLoginController::class)
->name('user_account.login');

Route::post('/user/guest/login', \App\Http\Controllers\User\User_GuestsController::class)
->name('user_guests.login');

Route::post('/user/logout', \App\Http\Controllers\User\LogOutController::class)
->name('user.logout');

Route::post('/room/create', \App\Http\Controllers\Room\CreateRoomController::class)
->name('room.create');

Route::post('/room/select_form_update', \App\Http\Controllers\Room\UpdateSelectRoomsFormController::class)
->name('room.select_form_update');

Route::post('/room/entry', \App\Http\Controllers\Room\EntryRoomController::class)
->name('room.entry');

Route::post('/room/room_form_update', \App\Http\Controllers\Room\RoomKeepUpdateController::class)
->name('room.room_form_update');

Route::post('/room/leave_room', \App\Http\Controllers\Room\RoomLeaveController::class)
->name('room.leave_room');

Route::post('/room/ready_user_room', \App\Http\Controllers\Room\ReadyController::class)
->name('room.ready_user_room');

Route::post('/room/gamestart_room', \App\Http\Controllers\Room\GameStartController::class)
->name('room.gamestart_room');

Route::post('/game/update_game', \App\Http\Controllers\Game\UpdateGameController::class)
->name('game.update_game');

Route::post('/game/putStone_game', \App\Http\Controllers\Game\PutStoneController::class)
->name('game.putStone_game');

Route::post('/game/surrender_game', \App\Http\Controllers\Game\SurrenderController::class)
->name('game.surrender_game');

// 一時的
Route::post('/game/end_game', \App\Http\Controllers\Game\DeleteRoomTest::class)
->name('game.end_game');
