<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required')]
    public $name = "";

    #[Validate('required|unique:users,email|email')]
    public $email = "";

    public $password = "";

    function mount()
    {
        $this->password = bcrypt('password');
    }
}
