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
}
