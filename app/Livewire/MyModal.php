<?php

namespace App\Livewire;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class MyModal extends Component
{
    #[Reactive]
    public $isOpen = false;
}
