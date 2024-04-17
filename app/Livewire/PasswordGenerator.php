<?php

namespace App\Livewire;

use Livewire\Component;

class PasswordGenerator extends Component
{
    public $password;

    public $length = 8;

    public $types = [
        'specialChars' => true,
        'uppercase' => true,
        'numbers' => true,
    ];

    function generatePassword()
    {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';
        $specialChars = '!@#$%^&*()_+{}|:<>?';

        $collection = 'abcdefghijklmnopqrstuvwxyz';

        foreach ($this->types as $type => $value) {
            $collection .= $value ? ${$type} : '';
        }

        $password = '';

        for ($i = 0; $i < $this->length; $i++) {
            $password .= $collection[rand(0, strlen($collection) - 1)];
        }

        $this->password  = $password;
    }

    function resetAll()
    {
        $this->reset('types');
    }
}
