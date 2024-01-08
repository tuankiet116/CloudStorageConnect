<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGoogleDrive extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'access_token',
        'user_id',
        'google_id'
    ];
}
