<?php

namespace App\Livewire;

use App\Livewire\Forms\EditUserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\Form;

class EditUser extends Component
{
    public User $user;
    public EditUserForm $form;

    function mount()
    {
        $this->form->name = $this->user->name;
        $this->form->email = $this->user->email;
    }

    function update()
    {
        $this->user->update($this->form->all());
        session()->flash('status', 'User is updated.');
        $this->redirect(route('event.user'));
    }
}
