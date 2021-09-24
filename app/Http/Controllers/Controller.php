<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\ThemeManager;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $theme = get_buzzy_theme();
        $locale = get_buzzy_locale();

        $this->setTheme($theme);
        $this->setLocale($locale);

         View::share(
             [
                'DB_USER_THEME' => $theme,
                'DB_USER_LANG' => $locale
             ]
         );
    }

    private function setTheme($theme)
    {
        app(ThemeManager::class)->init($theme);
    }

    private function setLocale($locale)
    {
        app()->setLocale($locale);
        Carbon::setLocale($locale);
    }
}
