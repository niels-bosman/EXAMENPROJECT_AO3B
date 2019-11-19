<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tel_number', 'street', 'house_number', 'city', 'zipcode'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function check_account($route)
    {
        if (User::check_logged_in()) {
            if (Auth::user()->email_verified_at) {
                if (Auth::user()->blocked == "0") {
                    return $route;
                }
                return '/account_blocked';
            }
            return '/account_not_activated';
        } else {
            return '/auth/login';
        }
    }

    public static function check_logged_in() {
        if (!Auth::user() == null) {
            return true;
        } else {
            return false;
        }
    }
}
