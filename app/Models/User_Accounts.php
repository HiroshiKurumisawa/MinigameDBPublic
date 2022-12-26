<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Accounts extends Model
{
    use HasFactory;

    protected $table = "user_accounts";
    protected $primaryKey = 'manage_id';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $fillable = ['login_id', 'user_name', 'pass_hash', 'last_login', 'connection_status',];
}
