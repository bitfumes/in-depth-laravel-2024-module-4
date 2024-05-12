<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;
use Illuminate\Support\Str;

class CreatePost extends CreateRecord
{
    use HasWizard;
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['title']);
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Post created with title: ' . $this->record['title'];
    }

    protected function getSteps(): array
    {
        return [
            Step::make('title')
                ->schema([
                    TextInput::make('title')
                        ->label('Title')
                        ->placeholder('Enter the title of the post')
                        ->required(),
                ]),
            Step::make('content')
                ->schema([
                    MarkdownEditor::make('content')
                        ->label('Content')
                        ->placeholder('Enter the content of the post')
                        ->required(),
                ]),
            Step::make('Visibility')
                ->schema([
                    DateTimePicker::make('published_at')
                        ->label('Published At')
                        ->placeholder('Select the date and time when the post should be published'),
                ]),
            Step::make('Image')
                ->schema([
                    FileUpload::make('image')
                        ->label('Image')
                        ->placeholder('Upload an image for the post')
                        ->image(),
                ]),
        ];
    }
}
