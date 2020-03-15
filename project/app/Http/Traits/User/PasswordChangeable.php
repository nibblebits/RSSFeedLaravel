<?php

namespace App\Http\Traits\User;

use Illuminate\Support\Facades\Hash;

trait PasswordChangeable
{
    public function setPassword($new_password)
    {
        $this->password = Hash::make($new_password);
        return $this;
    }
}