<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class PasswordGenerator extends Component
{
    public $password;

    function generatePassword()
    {
        $this->password = Str::random(12);
    }
}
