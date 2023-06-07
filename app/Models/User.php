<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'username',
        'password',
        'role'
    ];

    public function isDev()
    {
        if ($this->role == 'dev') {
            return true;
        } else {
            return false;
        }
    }

    public function isAdmin()
    {
        if ($this->role == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function isPetugas()
    {
        if ($this->role == 'petugas') {
            return true;
        } else {
            return false;
        }
    }
}
