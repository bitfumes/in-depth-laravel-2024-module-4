<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class CreateUser extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->placeholder('Enter your name'),
                TextInput::make('email')
                    ->label('Email')
                    ->unique()
                    ->required()
                    ->placeholder('Enter your email'),
            ])->statePath('data');
    }

    public function create()
    {
        $data = [
            ...$this->form->getState(),
            'password' => bcrypt('password'),
        ];

        User::create($data);

        return redirect()->route('event.user');
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
