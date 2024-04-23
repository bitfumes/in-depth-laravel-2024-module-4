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
        return redirect()->route('event.user');
    }

    public $isModalOpen = false;
    function openModal()
    {
        $this->isModalOpen = true;
    }

    // #[On('close-modal')]
    function closeModal()
    {
        $this->isModalOpen = false;
    }
}
