<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;

class DynamicForm extends Component
{

    public UserForm $form;

    public $count = 0;

    function submit()
    {
        $this->form->validate();
        User::create($this->form->all());
        $this->form->reset();
        session()->flash('status', 'User is created.');
        $this->redirectRoute('event.user');
    }

    function add()
    {
        $this->count++;
    }

    function remove()
    {
        $this->count--;
    }
}
