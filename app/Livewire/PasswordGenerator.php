<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class PasswordGenerator extends Component
{
    public $password;

    public $length = 8;
    public $characters = true;
    public $numbers = true;

    function generatePassword()
    {
        $this->password = Str::random($this->length);
    }
}
