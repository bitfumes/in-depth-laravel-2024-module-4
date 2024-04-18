<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DynamicForm extends Component
{
    #[Validate('required')]
    public $name = "";

    #[Validate('required|unique:users,email')]
    public $email = "";

    function submit()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt('password')
        ]);
    }
}
