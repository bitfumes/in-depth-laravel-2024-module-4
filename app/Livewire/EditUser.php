<?php

namespace App\Livewire;

use App\Livewire\Forms\EditUserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\Form;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use WithFileUploads;

    public User $user;
    public EditUserForm $form;

    function mount()
    {
        $this->form->name = $this->user->name;
        $this->form->email = $this->user->email;
    }

    function update()
    {
        $path = $this->form->avatar->store(path: 'avatar');
        $this->user->update([...$this->form->except('avatar'), 'avatar' => $path]);
        session()->flash('status', 'User is updated.');
        $this->redirect(route('event.user'));
    }
}
