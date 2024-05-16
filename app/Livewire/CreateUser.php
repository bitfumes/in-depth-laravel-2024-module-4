<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class CreateUser extends Component implements HasForms
{
    use InteractsWithForms;

    public function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
