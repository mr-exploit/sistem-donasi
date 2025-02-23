<?php

namespace App\Filament\Resources\DashboardResource\Pages;

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';
}
