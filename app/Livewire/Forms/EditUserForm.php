<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class EditUserForm extends Form
{
    #[Validate('required')]
    public $name = "";

    #[Validate('required|unique:users,email|email')]
    public $email = "";

    #[Validate('image|max:1024')]
    public $avatar;
}
