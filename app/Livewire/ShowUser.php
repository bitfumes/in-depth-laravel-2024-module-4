<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ShowUser extends Component
{
    public User $user;

    #[Computed]
    function avatar()
    {
        return "/storage/{$this->user->avatar}";
    }
}
