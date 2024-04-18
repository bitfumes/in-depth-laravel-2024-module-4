<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class DynamicForm extends Component
{
    public $name = "";
    public $email = "";

    function submit()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt('password')
        ]);
    }
}
