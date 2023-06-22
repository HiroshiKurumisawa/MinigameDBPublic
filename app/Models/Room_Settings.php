<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Settings extends Model
{
    use HasFactory;

    protected $table = "room_settings";

    protected $fillable = ['room_name', 'room_password', 'max_room_users', 'in_room_users', 'user_host', 'user_entry', 'ready_status_host', 'ready_status_entry', 'game_status','game_rule'];
}
