<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game_Datas extends Model
{
    use HasFactory;

    protected $table = "game_datas";

    protected $fillable = ['room_name', 'set_point', 'game_state'];
}
