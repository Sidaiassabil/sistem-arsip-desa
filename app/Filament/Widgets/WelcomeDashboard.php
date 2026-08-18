<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class WelcomeDashboard extends Widget
{
    protected string $view = 'filament.widgets.welcome-dashboard';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 0;
}