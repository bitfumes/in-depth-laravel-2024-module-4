<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Filament\Resources\UserResource\Pages\ListUsers;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListUsers::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', $this->getPageTableQuery()->count())->description("Total number of users in the system")->descriptionIcon('heroicon-o-users')->color('primary'),
            Stat::make('Verified', $this->getPageTableQuery()->whereNotNull('email_verified_at')->count())->description("Total number of verified user ")->descriptionIcon('heroicon-o-users')->color('warning'),
            Stat::make('Unverified', $this->getPageTableQuery()->whereNull('email_verified_at')->count())->description("Total number of unverified")->descriptionIcon('heroicon-o-users')->color('danger'),
        ];
    }
}
