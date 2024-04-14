<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePost extends Component
{
    public $name;

    function mount()
    {
        $this->name = auth()->user()?->name;
    }
}
