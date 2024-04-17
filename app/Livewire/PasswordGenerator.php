<?php

namespace App\Livewire;

use Livewire\Component;

class PasswordGenerator extends Component
{
    public $password;

    public $length = 8;
    public $uppercase = true;
    public $numbers = true;

    function generatePassword()
    {
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        $uppercaseLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';

        $collection = $letters;
        if ($this->numbers) {
            $collection .= $numbers;
        }

        if ($this->uppercase) {
            $collection .= $uppercaseLetters;
        }

        $password = '';

        for ($i = 0; $i < $this->length; $i++) {
            $password .= $collection[rand(0, strlen($collection) - 1)];
        }

        $this->password  = $password;
    }
}
