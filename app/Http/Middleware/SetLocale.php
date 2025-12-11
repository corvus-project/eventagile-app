<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class   SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Priority: session -> authenticated user preference -> app default
        $locale = session('locale');

        if (! $locale && Auth::check() && Auth::user()->locale) {
            $locale = Auth::user()->locale;
        }

        $locale = $locale ?? config('app.locale');

        App::setLocale($locale);

        return $next($request);
    }
}