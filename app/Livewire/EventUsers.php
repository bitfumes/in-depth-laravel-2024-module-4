<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class EventUsers extends Component
{
    #[Url(history: true)]
    public $search = '';

    function render()
    {
        return view('livewire.event-users', [
            'users' => $this->search ? User::where('name', 'LIKE', "%$this->search%")->get() : User::all()
        ]);
    }

    function delete(User $user)
    {
        $user->delete();
        session()->flash('status', 'User is deleted!.');
        $this->dispatch('close-modal');
    }

    public $isModalOpen = false;

    public User $editUser;

    function openModal($id)
    {
        $this->editUser = User::find($id);
        $this->isModalOpen = true;
    }

    // #[On('close-modal')]
    function closeModal()
    {
        $this->isModalOpen = false;
    }
}
