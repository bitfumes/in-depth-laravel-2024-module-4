<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.livewire-counter')]
class Counter extends Component
{
    public $count = 1;

    // #[Title('Counter Pageeeeeee')]
    public function render()
    {
        return view('livewire.counter')->title('Counter Pageeeeeee');
    }

    function increment()
    {
        $this->count++;
    }

    function decrement()
    {
        $this->count--;
    }
}
