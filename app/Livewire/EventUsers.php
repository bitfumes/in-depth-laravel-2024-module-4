<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class EventUsers extends Component
{

    public Collection $users;

    function mount()
    {
        $this->users = User::all();
    }

    function delete(User $user)
    {
        $user->delete();
        session()->flash('status', 'User is deleted!.');
        return redirect()->route('event.user');
    }
}
