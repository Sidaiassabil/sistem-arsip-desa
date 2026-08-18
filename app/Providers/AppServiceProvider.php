<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Arsip;
use App\Models\KategoriArsip;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\PerangkatDesa;
use App\Models\KegiatanPembangunan;
use App\Models\DokumenPembangunan;
use App\Models\DokumenKeuangan;
use App\Observers\ActivityObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Arsip::observe(ActivityObserver::class);
        KategoriArsip::observe(ActivityObserver::class);
        SuratMasuk::observe(ActivityObserver::class);
        SuratKeluar::observe(ActivityObserver::class);
        PerangkatDesa::observe(ActivityObserver::class);
        KegiatanPembangunan::observe(ActivityObserver::class);
        DokumenPembangunan::observe(ActivityObserver::class);
        DokumenKeuangan::observe(ActivityObserver::class);
    }
}
