<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Guests extends Model
{
    use HasFactory;

    protected $table = "user_guests";
    protected $primaryKey = 'manage_id';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $fillable = ['login_id', 'user_name', 'last_login', 'connection_status',];
}
