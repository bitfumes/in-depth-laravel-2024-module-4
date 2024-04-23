<?php

namespace App\Livewire;

use App\Livewire\Forms\EditUserForm;
use App\Models\User;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditUserModal extends Component
{
    use WithFileUploads;

    #[Reactive]
    public $isOpen = true;

    public User $user;
    public EditUserForm $form;

    function mount()
    {
        $this->form->name = $this->user->name;
        $this->form->email = $this->user->email;
    }

    function update()
    {
        if ($this->form->avatar) {
            $path = $this->form->avatar->store(path: 'public/avatar');
            $path = str_replace('public/', "", $path);
            $this->user->update(['avatar' => $path]);
        }

        $this->user->update($this->form->except('avatar'));
        session()->flash('status', 'User is updated.');
        $this->redirect(route('event.user'), navigate: true);
    }
}
