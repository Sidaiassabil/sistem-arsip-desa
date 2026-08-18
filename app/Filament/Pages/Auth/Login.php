<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Illuminate\Contracts\Support\Htmlable;

class Login extends BaseLogin
{
     public function getHeading(): string|Htmlable
     {
          return 'Selamat Datang';
     }

     public function getSubheading(): string|Htmlable|null
     {
          return 'Masuk ke Sistem Arsip Desa Luwuk';
     }
}
