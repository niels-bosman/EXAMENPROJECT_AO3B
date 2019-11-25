<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Authenticatable implements AuthContract, CanResetPasswordContract, MustVerifyEmail
{
    use CanResetPassword;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tel_number', 'street', 'house_number', 'city', 'zipcode', 'auth_level', 'blocked'
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
            // Is ingelogged
            if (User::check_email_verified()) {
                // Is email verifiëerd
                if (User::check_blocked()) {
                    // Is niet geblokkeerd
                    if (User::check_wrong_count()) {
                        // Heeft niet te vaak ingelogged
                        return $route;
                    }
                    // Te vaak ingelogged
                    return '/profiel/account_blocked_password';
                }
                // Geblokkeerd
                return '/profiel/account_blocked';
            }
            // Email nog niet geverifiëerd
            return '/profiel/account_not_activated';
        }
        // Nog niet ingelogd
        return '/auth/login';
    }

    public static function check_privileges()
    {
        if (User::check_logged_in()) {
            // is ingelogd
            if (User::check_authentication_level()) {
                // gebruiker heeft rechten
                $data = Auth::user()->auth_level;
                return $data;
            }
        }
        return 0;
    }

    public static function check_logged_in()
    {
        if (!Auth::user() == null) {
            return true;
        } else {
            return false;
        }
    }

    public static function check_blocked()
    {
        if (Auth::user()->blocked == "0") {
            return true;
        } else {
            return false;
        }
    }

    public static function check_wrong_count()
    {
        if (Auth::user()->wrong_count == "0") {
            return true;
        } else {
            return false;
        }
    }

    public static function check_email_verified()
    {
        if (Auth::user()->email_verified_at) {
            return true;
        } else {
            return false;
        }
    }

    public static function check_authentication_level()
    {
        if (Auth::user()->auth_level) {
            return true;
        } else {
            return false;
        }
    }
}
