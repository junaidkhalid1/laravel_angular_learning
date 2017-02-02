<?php

namespace App\Verifiers;

use Illuminate\Support\Facades\Auth;


/**
 * Created by PhpStorm.
 * User: Junaid KHALID
 * Date: 9/9/2016
 * Time: 3:47 AM
 */
class PasswordGrantVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}
