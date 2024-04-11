<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;

    public function render()
    {
        return view('livewire.counter');
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
