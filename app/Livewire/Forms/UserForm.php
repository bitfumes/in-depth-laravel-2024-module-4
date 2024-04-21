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
    ], message: [
        'name.*.required' => 'The name field is required.',
    ])]
    public $name = [''];

    #[Validate(
        [
            'email' => 'required',
            'email.*' => 'required|unique:users,email|email',
        ],
        message: [
            'email.*.required' => 'The email field is required.',
            'email.*.email' => 'The email field must be a valid email address.',
            'email.*.unique' => 'The email has already been taken.'
        ]
    )]
    public $email = [''];

    function create()
    {
        $this->validate();
        foreach ($this->name as $key => $value) {
            User::create([
                'name' => $this->name[$key],
                'email' => $this->email[$key],
                'password' => bcrypt('password')
            ]);
        }
    }
}
