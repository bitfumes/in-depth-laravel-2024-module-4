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
        $this->form->create();
        session()->flash('status', 'User is created.');
        $this->redirectRoute('event.user', navigate: true);
    }

    function add()
    {
        $this->form->name[] = '';
        $this->form->email[] = '';
    }

    function remove()
    {
        $this->count--;
    }
}
