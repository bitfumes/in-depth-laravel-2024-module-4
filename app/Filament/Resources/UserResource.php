<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Resources\UserResource\RelationManagers\PostsRelationManager;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Actions\Action as NotificationAction;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('email')->icon('heroicon-m-envelope'),
                TextEntry::make('email_verified_at')->since(),
                ImageEntry::make('avatar')->circular()
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->prefixIcon('heroicon-o-user')
                    ->placeholder('Enter your name')
                    ->required(),
                TextInput::make('email')
                    ->prefixIcon('heroicon-o-paper-airplane')
                    ->placeholder('Enter your email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required(),
                DateTimePicker::make('email_verified_at')
                    ->prefixIcon('heroicon-m-check-badge'),
                TextInput::make('password')
                    ->prefixIcon('heroicon-o-key')
                    ->placeholder('Your secure password')
                    ->minLength(8)
                    ->password()
                    ->revealable()
                    ->dehydrated(fn ($state) => filled($state))
                    ->visibleOn('create')
                    ->required(fn (string $context): bool => $context === 'create'),
                FileUpload::make('avatar')
                    ->directory('avatar')
                    ->avatar()
                    ->imageEditor()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->circular(),
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('post_count')
                    ->state(fn ($record) => $record->posts()->count()),
                IconColumn::make('email_verified_at')->boolean()
            ])
            ->filters([
                Filter::make('email_verified_at')
                    ->name('Email Not Verifieed')
                    ->query(fn ($query) => $query->whereNull('email_verified_at'))
                    ->toggle(),
                Filter::make('email')
                    ->form([
                        TextInput::make('email')
                            ->label('Filter by Email')
                            ->debounce(300)
                    ])
                    ->query(fn ($query, $data) => $query->where('email', 'LIKE', '%' . $data['email'] . '%'))
                    ->indicateUsing(function (array $data): ?string {
                        if (!$data['email']) {
                            return null;
                        }

                        return 'Email inludes :' . $data['email'];
                    })
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Action::make('Destroy')
                        ->color('danger')
                        ->icon('heroicon-s-trash')
                        ->requiresConfirmation()
                        ->action(fn ($record) => $record->delete()),
                    Action::make('Mark Verified')
                        ->color('info')
                        ->icon('heroicon-c-check-circle')
                        ->requiresConfirmation()
                        ->action(function ($record) {
                            $record->forceFill(['email_verified_at' => now()]);
                            $record->save();

                            Notification::make()
                                ->title('Marked Verified successfully')
                                ->icon('heroicon-c-check-badge')
                                ->success()
                                ->actions([
                                    NotificationAction::make('undo')
                                        ->color('gray')
                                        ->dispatch('undoVerify', ['recordId' => $record->id])
                                ])
                                ->send();
                        }),
                    Action::make('Mark Un-Verified')
                        ->color('warning')
                        ->icon('heroicon-c-check-circle')
                        ->requiresConfirmation()
                        ->action(function ($record) {
                            $record->forceFill(['email_verified_at' => null]);
                            $record->save();

                            Notification::make()
                                ->title('Marked Unverified successfully')
                                ->success()
                                ->seconds(5)
                                ->send();
                        })
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            PostsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}/view'),
        ];
    }
}
