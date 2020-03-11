<?php

namespace App\Http\Traits\User;

use Illuminate\Support\Facades\Hash;

trait PasswordChangeable
{
    public function changePassword($new_password)
    {
        $this->password = Hash::make($new_password);
        $this->save();
    }
}