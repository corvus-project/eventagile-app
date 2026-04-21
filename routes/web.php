<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Account\AccountHome;
use App\Livewire\Client\EventRegistration;
use App\Livewire\Dashboard\DashboardHome;
use App\Livewire\Dashboard\Events;
use App\Models\Tenant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/debug', function () {

    $url = 'http://127.0.0.1:8000/email/verify/2/12fcecd6021a53c4df89b2fa15b53439e7b0fcc0?expires=1776700752&signature=e55441dd2a493b66d138a171ab93d6d5840fcaf7bde33217daf0e3904fd38f9a';
    $domain = substr($url, strpos($url, 'email/verify'), strlen($url));

    dd($domain);
    return Carbon::now();
})->name('welcome');

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        Route::livewire('/', 'pages::site.home')->name('home');
        Route::livewire('/signup', 'pages::site.signup')->name('signup');

        Route::livewire('/account-setup', 'pages::site.temporary')->name('temporary');
        Route::middleware('auth')->group(function () {

            Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
                ->middleware('signed')
                ->name('verification.verify');

            Route::post('logout', LogoutController::class)
                ->name('logout');
        });
    });
}

Route::livewire('/privacy', 'pages::site.privacy')->name('privacy');
Route::livewire('/features', 'pages::site.features')->name('features');
Route::livewire('/examples', 'pages::site.examples')->name('examples');
Route::livewire('/contact', 'pages::site.contact')->name('contact');
Route::livewire('/pricing', 'pages::site.pricing')->name('pricing');
Route::livewire('/support', 'pages::site.support')->name('support');

//Route::livewire('/auth/login', 'pages::auth.login')->name('login');
//Route::livewire('/auth/register', 'pages::auth.register')->name('register');

Route::livewire('/auth/forget-password', 'pages::auth.reset')->name('password.request');


/* Route::middleware('auth')->group(function () {

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
}); */
