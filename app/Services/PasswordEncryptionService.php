<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class PasswordEncryptionService
{
    public function encryptPassword($password) {
        return Hash::make($password);
    }

    public function checkPassword($request_password, $user_password) {
        return Hash::check($request_password, $user_password);
    }
}
