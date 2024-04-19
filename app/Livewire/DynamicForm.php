<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;

class DynamicForm extends Component
{

    public UserForm $form;

    function submit()
    {
        $this->form->validate();
        User::create($this->form->all());
    }
}
