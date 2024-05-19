<?php

namespace App\Filament\App\Pages;

use Filament\Pages\Page;

class CreatePost extends Page
{

    protected static ?string $navigationGroup = 'Posts';

    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.app.pages.create-post';
}
