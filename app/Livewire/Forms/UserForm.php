<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate([
        'name' => 'required',
        'name.*' => 'required',
    ])]
    public $name = [];

    #[Validate([
        'email' => 'required',
        'email.*' => 'required|unique:users,email|email',
    ])]
    public $email = [];

    function create()
    {
        foreach ($this->name as $key => $value) {
            User::create([
                'name' => $this->name[$key],
                'email' => $this->email[$key],
                'password' => bcrypt('password')
            ]);
        }
    }
}
