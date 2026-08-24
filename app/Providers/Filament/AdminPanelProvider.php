<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\WelcomeDashboard;
use App\Filament\Widgets\StatistikSistem;
use App\Filament\Widgets\AktivitasTerbaru;
use App\Filament\Pages\Auth\Login;
use App\Filament\Widgets\ArsipTerbaru;
use App\Filament\Widgets\GrafikArsipKategori;
use App\Filament\Widgets\GrafikArsipTahun;
use App\Filament\Widgets\StatistikArsip;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->passwordReset()
            ->favicon(asset('images/logo.png'))
            ->brandLogo(fn() => view('filament.admin.brand'))
            ->brandLogoHeight('40px')
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->navigationGroups([
                'Arsip',
                'Surat',
                'Pemerintahan',
                'Pembangunan',
                'Keuangan',
                'Laporan',
                'Pengaturan',
            ])
            ->pages([
                Dashboard::class,
            ])
            ->widgets([
                WelcomeDashboard::class,
                StatistikSistem::class,
                StatistikArsip::class,
                ArsipTerbaru::class,
                AktivitasTerbaru::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
