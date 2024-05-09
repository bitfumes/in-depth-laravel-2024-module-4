<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', '192.1k')->description("Total number of users in the system")->descriptionIcon('heroicon-o-users')->color('primary'),
            Stat::make('Verified', '192.1k')->description("Total number of verified user ")->descriptionIcon('heroicon-o-users')->color('warning'),
            Stat::make('Unverified', '192.1k')->description("Total number of unverified")->descriptionIcon('heroicon-o-users')->color('danger'),
        ];
    }
}
